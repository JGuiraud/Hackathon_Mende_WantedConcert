// we set these cookies using javascript to skip the cache in HTML files.
// The drawback is that we can't classify non-js users (but it can't be
// an advantage, as we usually don't want to classify bots)
var TEST_AB_COOKIE_PREFIX = 'testab_';

function setCookie(name, value, duration_s) {
    var expires = '';
    if (duration_s) {
        var date = new Date();
        date.setTime(date.getTime() + (duration_s * 1000));
        expires = '; expires=' + date.toGMTString();
    }
    var host = (document.location.host.indexOf('.com') != -1)? '.freepik.com': '.freepik.es';
    document.cookie = encodeURIComponent(name) + '=' + encodeURIComponent(value) + expires + '; domain=' + host + '; path=/';
}

function getCookie(name) {
    /// <summary>Gets the foobar cookie and returns it's value.</summary>
    var nameEq = encodeURIComponent(name) + '=';
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ')
        	c = c.substring(1, c.length);
        if (c.indexOf(nameEq) === 0)
        	return decodeURIComponent(c.substring(nameEq.length));
    }
    return null;
}

function deleteCookie(name) {
    var date = new Date();
    date.setTime(date.getTime() + (-1 * 24 * 60 * 60 * 1000));
    var host = (document.location.host.indexOf('.com') != -1)? '.freepik.com': '.freepik.es';
    document.cookie = encodeURIComponent(name) + '=; expires=' + date.toGMTString() + '; domain=' + host + '; path=/';
}
/* Test A/B */
function getTestAB(name) {
    return getCookie(TEST_AB_COOKIE_PREFIX + name);
}

function selectRandomTestAB(split) {
    var r = Math.random();
    if (r < split / 2.0) {
        return 'B1';
    } else if (r < split) {
        return 'B2';
    } else if ((r - split) < (1 - split) / 2.0) {
        return 'A1';
    } else {
        return 'A2';
    }
}

function setRandomTestAB(name, split, test_duration_s) {
    var slot = selectRandomTestAB(split);
    setCookie(TEST_AB_COOKIE_PREFIX + name, slot, test_duration_s);
}

function isInTestAB(name) {
	var slot = getTestAB(name);
	return ('B1' == slot || 'B2' == slot);
}

$(document).ready(function() {
    $.getJSON(_get_url_ajax() + 'test_ab.php?o=' + ACCOUNTS_API_KEY, function(tests_ab, status) {
        //console.log('status:', status);
        for (var i = 0; i < tests_ab.length; i++) {
            var test = tests_ab[i];
            var slot = getTestAB(test.name);
            if (!slot) {
                setRandomTestAB(test.name, test.split, test.duration_s || (30 * 24 * 3600));
            }
        }
    });
});
