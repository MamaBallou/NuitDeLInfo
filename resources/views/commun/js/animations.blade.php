@include('commun.js.functions')
<script>
    class CardAnimation {
        constructor(cards) {
            this.cards = cards;
        }

        init() {
            let duree_longue = 600;

            function rotate(card, step = 1, from_zero = false) {
                let rotation = -step * 6;
                let ancienne_rotation = step * 3;
                let duree = duree_longue;

                if (from_zero) {
                    rotation = -3;
                    ancienne_rotation = 0;
                    duree /= 2;
                }

                card.animate({
                    rotate: rotation,
                }, {
                    duration: 200,
                    queue: false,
                    step: function(now, fx) {
                        let mouvement = now + ancienne_rotation;
                        $(this).css('-webkit-transform', 'rotate(' + mouvement + 'deg)');
                        $(this).css('-moz-transform', 'rotate(' + mouvement + 'deg)');
                        $(this).css('transform', 'rotate(' + mouvement + 'deg)');
                    },
                    complete: function() {
                        step *= -1;
                        rotate(card, step);
                    }
                });
            }

            function float(card, top = -0.5) {
                card.animate({
                    top: top + 'em',
                }, {
                    duration: duree_longue,
                    queue: false,
                    complete: function() {
                        top *= -1;
                        float(card, top);
                    }
                });
            }

            function beginAnimation(card) {
                card.stop();
                rotate(card, 1, true);
                // float(card);
            }

            function stopAnimation(card) {
                card.stop();

                var rotation_acutelle = getRotationDegrees(card);

                card.animate({
                    rotate: -rotation_acutelle,
                }, {
                    duration: 250,
                    easing: "swing",
                    queue: false,
                    step: function(now, fx) {
                        let mouvement = now + rotation_acutelle;
                        $(this).css('-webkit-transform', 'rotate(' + mouvement + 'deg)');
                        $(this).css('-moz-transform', 'rotate(' + mouvement + 'deg)');
                        $(this).css('transform', 'rotate(' + mouvement + 'deg)');
                    },
                });

                float(card);
            }

            function showCard(card) {
                setTimeout(function() {
                    card.animate({
                        opacity: 1,
                    }, {
                        duration: 750,
                        complete: function() {
                            card.hover(function() {
                                beginAnimation($(this));
                            }, function() {
                                stopAnimation($(this));
                            });
                        }
                    });
                }, card.attr('data-index') * 200);
            }

            this.cards.each(function(index) {
                let card = $(this);
                setTimeout(function() {
                    float(card);
                }, index * 200);

                showCard(card);
            });
        }
    }
</script>
