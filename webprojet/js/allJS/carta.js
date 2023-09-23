$.fn.commentCards = function(){

  return this.each(function(){

    var $this = $(this),
        $cards = $this.find('.carda'),
        $current = $cards.filter('.carda--current'),
        $next;

    $cards.on('click',function(){
      if ( !$current.is(this) ) {
        $cards.removeClass('carda--current carda--out carda--next');
        $current.addClass('carda--out');
        $current = $(this).addClass('carda--current');
        $next = $current.next();
        $next = $next.length ? $next : $cards.first();
        $next.addClass('carda--next');
      }
    });

    if ( !$current.length ) {
      $current = $cards.last();
      $cards.first().trigger('click');
    }

    $this.addClass('cards--active');

  })

};

$('.cards').commentCards();