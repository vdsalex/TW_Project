/**
 * Created by Alina Coca on 10.06.2017.
 */
$.fn.followTo1 = function (pos) {
    var $this = this,
        $window = $(window);

    $window.scroll(function (e) {
        if ($window.scrollTop() < pos) {
            $this.css({
                position: 'absolute',
                top: pos
            });
        } else {
            $this.css({
                position: 'fixed',
                top: 90
            });
        }
    });
};

$('#caption1').followTo1(160);



