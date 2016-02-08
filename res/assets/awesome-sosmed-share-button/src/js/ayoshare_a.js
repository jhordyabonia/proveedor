/*********************************************************************
 * #### jQuery Awesome Sosmed Share Button/ayoshare.js v07 ####
 * Coded by Ican Bachors 2014.
 * http://ibacor.com/labs/jquery-awesome-sosmed-share-button/
 * Updates will be posted to this site.
 *********************************************************************/
$.fn.aayoshare = function(h, i, j, k, l, n, o, p, q, r, s) {
    var b = encodeURIComponent(location.href),
        a = '',
        desk = '',
        img = '',
        html = '';
    if ($(document).attr('title') != null) {
        a += $(document).attr('title')
    }
    if ($('meta[name="description"]').attr('content') != null) {
        desk += $('meta[name="description"]').attr('content')
    } else if ($(document).attr('title') != null) {
        desk += $(document).attr('title')
    }
    if ($('meta[property="og:image"]').attr('content') != null) {
        img += $('meta[property="og:image"]').attr('content')
    }
    if (facebook == true) {
        html += '<p><a href="http://www.facebook.com/sharer/sharer.php?u=' + b + '" onclick="javascript:void window.open(\'http://www.facebook.com/sharer/sharer.php?u=' + b + '\',\'ibacor.com\',\'width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0\');return false;" class="sh_btn sh-facebook" title="Facebook"><i class="fa fa-facebook"></i> <span id="iabacor_count_fb"><i class="fa fa-spinner fa-spin"></i></span></a></p>'
    }
    if (twitter == true) {
        html += '<p><a href="https://twitter.com/share?text=' + a + '+-+via @bachors&url=' + b + '" onclick="javascript:void window.open(\'https://twitter.com/share?text=' + a + '+-+via @bachors&url=' + b + '\',\'ibacor.com\',\'width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0\');return false;" class="sh_btn sh-twitter" title="Twitter"><i class="fa fa-twitter"></i> <span id="iabacor_count_tw"><i class="fa fa-spinner fa-spin"></i></span></a></p>'
    }
    if (google == true) {
        html += '<p><a href="https://plus.google.com/share?url=' + b + '" onclick="javascript:void window.open(\'https://plus.google.com/share?url=' + b + '\',\'ibacor.com\',\'width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0\');return false;" class="sh_btn sh-google" title="Google+"><i class="fa fa-google-plus"></i> <span id="iabacor_count_gp"><i class="fa fa-spinner fa-spin"></i></span></a></p>'
    }
    if (reddit == true) {
        html += '<p><a href="http://reddit.com/submit?url=' + b + '&title=' + a + '+-+via @bachors" onclick="javascript:void window.open(\'http://reddit.com/submit?url=' + b + '&title=' + a + '+-+via @bachors\',\'ibacor.com\',\'width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0\');return false;" class="sh_btn sh-reddit" title="Reddit"><i class="fa fa-reddit"></i> <span id="iabacor_count_rd"><i class="fa fa-spinner fa-spin"></i></span></a></p>'
    }
    if (linkedin == true) {
        html += '<p><a href="https://www.linkedin.com/shareArticle?mini=true&url=' + b + '&title=' + a + '&summary=' + desk + '" onclick="javascript:void window.open(\'https://www.linkedin.com/shareArticle?mini=true&url=' + b + '&title=' + a + '&summary=' + desk + '\',\'ibacor.com\',\'width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0\');return false;" class="sh_btn sh-linkedin" title="Linkedin"><i class="fa fa-linkedin"></i> <span id="iabacor_count_in"><i class="fa fa-spinner fa-spin"></i></span></a></p>'
    }
    if (pinterest == true) {
        html += '<p><a href="http://pinterest.com/pin/create/button/?url=' + b + '&media=' + img + '&description=' + desk + '" onclick="javascript:void window.open(\'http://pinterest.com/pin/create/button/?url=' + b + '&media=' + img + '&description=' + desk + '\',\'ibacor.com\',\'width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0\');return false;" class="sh_btn sh-pinterest" title="Pinterest"><i class="fa fa-pinterest"></i> <span id="iabacor_count_pn"><i class="fa fa-spinner fa-spin"></i></span></a></p>'
    }
    if (stumbleupon == true) {
        html += '<p><a href="http://www.stumbleupon.com/badge/?url=' + b + '" onclick="javascript:void window.open(\'http://www.stumbleupon.com/badge/?url=' + b + '\',\'ibacor.com\',\'width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0\');return false;" class="sh_btn sh-stumbleupon" title="Stumbleupon"><i class="fa fa-stumbleupon"></i> <span id="iabacor_count_up"><i class="fa fa-spinner fa-spin"></i></span></a></p>'
    }
    if (bufferapp == true) {
        html += '<p><a href="https://bufferapp.com/add?url=' + b + '&text=' + desk + '" onclick="javascript:void window.open(\'https://bufferapp.com/add?url=' + b + '&text=' + desk + '\',\'ibacor.com\',\'width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0\');return false;" class="sh_btn sh-buffer" title="Bufferapp"><i class="fa fa-bars"></i> <span id="iabacor_count_bf"><i class="fa fa-spinner fa-spin"></i></span></a></p>'
    }
    if (vk == true) {
        html += '<p><a href="http://vk.com/share.php?url=' + b + '" onclick="javascript:void window.open(\'http://vk.com/share.php?url=' + b + '\',\'ibacor.com\',\'width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0\');return false;" class="sh_btn sh-vk" title="VK"><i class="fa fa-vk"></i> <span id="iabacor_count_vk"><i class="fa fa-spinner fa-spin"></i></span></a></p>'
    }
    if (pocket == true) {
        html += '<p><a href="https://getpocket.com/save?title=' + a + '&url=' + b + '" onclick="javascript:void window.open(\'https://getpocket.com/save?title=' + a + '&url=' + b + '\',\'ibacor.com\',\'width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0\');return false;" class="sh_btn sh-pocket" title="Pocket"><i class="fa fa-get-pocket"></i> <span id="iabacor_count_pc"><i class="fa fa-spinner fa-spin"></i></span></a></p>'
    }
    if (total == true) {
        html += '<p><span class="sh-total" title="' + unescape('%53%68%61%72%65%20%62%79%20%40%62%61%63%68%6F%72%73') + '"><i class="fa fa-share-alt"></i> <span id="iabacor_count_sh"><i class="fa fa-spinner fa-spin"></i></span></span></p>'
    }
    $(this).html(html);
    $.ajax({
        url: 'http://ibacor.com/api/share-count?url=' + b,
        crossDomain: true,
        dataType: 'json'
    }).done(function(a) {
        if (facebook == true) {
            $('#iabacor_count_fb').html(m(a.count.facebook))
        }
        if (twitter == true) {
            $('#iabacor_count_tw').html(m(a.count.twitter))
        }
        if (google == true) {
            $('#iabacor_count_gp').html(m(a.count.google_plus))
        }
        if (reddit == true) {
            $('#iabacor_count_rd').html(m(a.count.reddit))
        }
        if (linkedin == true) {
            $('#iabacor_count_in').html(m(a.count.linkedin))
        }
        if (pinterest == true) {
            $('#iabacor_count_pn').html(m(a.count.pinterest))
        }
        if (stumbleupon == true) {
            $('#iabacor_count_up').html(m(a.count.stumbleupon))
        }
        if (bufferapp == true) {
            $('#iabacor_count_bf').html(m(a.count.bufferapp))
        }
        if (vk == true) {
            $('#iabacor_count_vk').html(m(a.count.vk))
        }
        if (pocket == true) {
            $('#iabacor_count_pc').html(m(a.count.pocket))
        }
        if (total == true) {
            $('#iabacor_count_sh').html(m(a.total))
        }
    }).fail(function() {
        if (facebook == true) {
            $('#iabacor_count_fb').html('0')
        }
        if (twitter == true) {
            $('#iabacor_count_tw').html('0')
        }
        if (google == true) {
            $('#iabacor_count_gp').html('0')
        }
        if (reddit == true) {
            $('#iabacor_count_rd').html('0')
        }
        if (linkedin == true) {
            $('#iabacor_count_in').html('0')
        }
        if (pinterest == true) {
            $('#iabacor_count_pn').html('0')
        }
        if (stumbleupon == true) {
            $('#iabacor_count_up').html('0')
        }
        if (bufferapp == true) {
            $('#iabacor_count_bf').html('0')
        }
        if (vk == true) {
            $('#iabacor_count_vk').html('0')
        }
        if (pocket == true) {
            $('#iabacor_count_pc').html('0')
        }
        if (total == true) {
            $('#iabacor_count_sh').html('0')
        }
    });

    function m(a) {
        var b = a;
        if (a >= 1000) {
            var c = ["", "k", "m", "b", "t"];
            var d = Math.floor(("" + a).length / 3);
            var e = '';
            for (var f = 2; f >= 1; f--) {
                e = parseFloat((d != 0 ? (a / Math.pow(1000, d)) : a).toPrecision(f));
                var g = (e + '').replace(/[^a-zA-Z 0-9]+/g, '');
                if (g.length <= 2) {
                    break
                }
            }
            if (e % 1 != 0) shortNum = e.toFixed(1);
            b = e + c[d]
        }
        return b
    }
};