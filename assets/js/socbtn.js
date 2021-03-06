!(function(){
/**
 *  plugins wordpress-seo,  WordPress All in One Seo, Platinum SEO Pack...
 *  https://wordpress.org/plugins/wordpress-seo/
 *  https://wordpress.org/plugins/all-in-one-seo-pack/
 *  https://wordpress.org/plugins/platinum-seo-pack/
 *  https://codex.wordpress.org/Meta_Tags_in_WordPress
 * 
 *     <meta property="og:type" content="">
 *     <meta property="og:title" content="">
 *     <meta property="og:locale" content="ru_RU">
 *     <meta property="og:description" content="">
 *     <meta property="og:url" content="">
 *     <meta property="og:site_name" content="">
 *     <meta property="og:image" content="">
 *     <meta property="og:image:width" content="">
 *     <meta property="og:image:height" content="">
 *     <meta name="twitter:card" content="">
 *     <meta name="twitter:description" content="">
 *     <meta name="twitter:title" content="">
 *     <meta name="twitter:image" content="">
 */

    var 
        description    = meta_content('name="description"'),
        og_description = meta_content('property="og:description"'),
        og_image_ssl   = meta_content('property="og:image:secure_url"'),
        og_image       = meta_content('property="og:image"'),
        og_title       = meta_content('property="og:title"'),
        og_url         = meta_content('property="og:url"'),
        data = {
            href:        encodeURIComponent( og_url || document.location.href || '' ),
            title:       encodeURIComponent( og_title || document.title || '' ),
            image:       encodeURIComponent( og_image_ssl || og_image || '' ),
            description: encodeURIComponent( og_description || description.content || '' )
        };

    var src = {
        'facebook'  : {
            share:   'https://facebook.com/sharer/sharer.php?u={{href}}&t={{title}}',
            counter: 'https://graph.facebook.com/?id={{href}}&callback={{callback}}',
            get_count: function(counter) { return counter.share.share_count || '';}
        },

        'instagram' : {
            share :  'https://www.instagram.com'
        },
        'google'    : {
            share:   'https://plus.google.com/share?url={{href}}',
            ajax : googlecounter
        },
        'linkedin'  : {
            share:   'https://www.linkedin.com/shareArticle?mini=true&url={{href}}&text={{title}}&summary={{description}}&mini=true',
            counter: 'https://www.linkedin.com/countserv/count/share?url={{href}}&callback={{callback}}',
            get_count: function(counter) { return counter.count || '';},
            w: 800
            // linkedIn // count: 0, fCnt: "0", fCntPlusOne: "1" 
        },
        'vk'        : {
            share:   'https://vk.com/share.php?url={{href}}&title={{title}}&image={{image}}',
            counter: 'https://vk.com/share.php?act=count&index=1&url={{href}}',
            get_count: function(counter) { return counter || '';}
        },
		'ok'        : {
			share:   'https://connect.ok.ru/dk?st.cmd=WidgetSharePreview&st.shareUrl={{href}}&title={{title}}'
        },
        'ya': {
            share:   'http://wow.ya.ru/posts_share_link.xml?url={{href}}&title={{title}}&body={{description}}'
        }
        ,
        'mailru': {
            share:   'http://connect.mail.ru/share?url={{href}}&title={{title}}&description={{description}}&imageurl={{image}}'
        },
        'twitter'   : {
            share :  'https://twitter.com/share?url={{href}}&text={{title}}'
        },
        'pinterest' : {
            share:   'http://pinterest.com/pin/create/button/?url={{href}}&media={{image}}&description={{title}}"',
            counter: 'https://widgets.pinterest.com/v1/urls/count.json?url={{href}}&callback={{callback}}',
            get_count: function(counter) { return counter.count || '';} //window.fn({"url":"","count":18})
        },
        'blogger': {
            share:'https://www.blogger.com/blog-this.g?u={{href}}&n={{title}}&t={{description}}'
        },
        'tumblr': {
            share:  'http://www.tumblr.com/share/link?url={{href}}&name={{title}}&description={{description}}'
            // 'https://www.tumblr.com/widgets/share/tool?canonicalUrl={{href}}&title={{title}}&caption={{description}}'
        },
        'livejournal': {
            share:  'http://www.livejournal.com/update.bml?subject={{title}}&event={{href}}'
        },
        'viber': {
            share:  'viber://forward?text={{href}}'
        },
        'skype': {
            share:  'https://web.skype.com/share?url={{href}}'
        },
        'yahoo': { 
            share:  'http://compose.mail.yahoo.com/?body={{href}}' 
        }
    }

    window.requestAnimFrame = (function(){
        return  window.requestAnimationFrame       || 
                window.webkitRequestAnimationFrame || 
                window.mozRequestAnimationFrame    || 
                window.oRequestAnimationFrame      || 
                window.msRequestAnimationFrame     || 
                function(callback, element){
                    window.setTimeout(callback, 1000/60);
                };
    })();

function set_counter(el, soc) {
    var script, callback, count_url;

    if ('function' === typeof src[soc].ajax) {
        src[soc].ajax(el);
        return true;
    }

    script    = document.createElement('script');
    callback  = ('liteshare_' + Math.random()).replace('.', '');
    count_url = _(src[soc].counter, { href: data.href, callback:callback });

    window[callback] = function(counter) {
        if ( 'function' === typeof src[soc].get_count ) {
            el.html( src[soc].get_count(counter) );
        }
        script.parentNode.removeChild(script);
    };

    script.src = count_url;
    document.body.appendChild(script);
}

function googlecounter(el) {
    jQuery.ajax({
        type: "POST",
        url: "https://clients6.google.com/rpc",
        processData: !0,
        contentType: "application/json",
        data: JSON.stringify({
            method: "pos.plusones.get",
            id: ''+document.location.href,
            params: {
                nolog: !0,
                id: ''+document.location.href,
                source: "widget",
                userId: "@viewer",
                groupId: "@self"
            },
            jsonrpc: "2.0",
            key: "p",
            apiVersion: "v1"
        }),
        success: function(b) {
            el.html(+(b.result.metadata.globalCounts.count ||''));
        }
    });
}


function open(type) {
    if (src[type].share) {
        var url = _( src[type].share, data );
        window.open(url, "Share lite", "location=no,toolbar=no,menubar=no," + get_position( src[type].w, src[type].h ));
    } 
}

function get_position( w, h ) {
    var 
        innerWidth, innerHeight, position, top, left, fixTop, fixLeft;
    innerWidth = jQuery(window).innerWidth();
    innerHeight = jQuery(window).innerHeight();
    w = parseInt( w || 640 );
    h = parseInt( h || 480 );
    position = [
        'width=' + w,
        'height=' + h
    ]
    if ( innerWidth <= 768 ) {
        position.push( 'top=0' );
        position.push( 'left=0' );
    }
    else {
        fixTop  = window.screenTop != undefined ? window.screenTop : screen.top; 
        fixLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;

        top = parseInt( (innerHeight - h ) / 4 + fixTop, 10 )
        left = parseInt( ( innerWidth - w ) / 2 + fixLeft, 10 )
       
        if ( innerWidth >= innerHeight ) {
            position.push( 'top=' + top );
            position.push( 'left=' + left );
        } else {
            position.push( 'top=' + left );
            position.push( 'left=' + top );
        }
    }
    return position.join(',');
}

function _(str, data) {
    return str.replace(/{{(.*?)}}/g, function(i, x){
        return data[x] || '';
    });
}

jQuery(document).ready(function(){
    
    var 
        social_button = jQuery( '.social-button' ),
        social_button_sticky = jQuery( '.social-button.sticky' );

    jQuery( document.body ).on( 'click', '.socbtn', function(ev){
        var el = jQuery(this);
        var type = el.attr( 'data-socbtn' );
        open(type);
        ev.preventDefault();
    });

    jQuery( '.socbtn', social_button ).each(function(){
        var el = jQuery(this);
        var type = el.attr( 'data-socbtn' );
                
        if ( src[type] && (src[type].counter || src[type].ajax) ) {
            set_counter(jQuery('.counter', el), type);
        }
        
    });
    
    resize();

    jQuery( window ).resize(function(){
        setTimeout(resize, 300);
    });

    function resize() {
        social_button_sticky.each(function(){
            var el = jQuery(this);

            window.requestAnimFrame(function(){
                var innerWidth, innerHeight, top, jel;
                jel = el;
                innerWidth  = jQuery(window).innerWidth();
                innerHeight = jQuery(window).innerHeight();
                top = (( innerWidth >= innerHeight ? innerHeight : innerWidth ) - el.innerHeight()) / 2;
                el.css( 'top', parseInt(top) );
            }, el);

        });
    }

});

/**
 * 
 * @param {*} selector - 'meta[name="description"]'
 */
function meta_content( selector ) {
   return '' + ( (document.querySelector( 'meta[' + selector + ']' )||{}).content || '' );
}

})();

