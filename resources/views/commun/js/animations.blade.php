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


    class EscapeGame {
        constructor() {
            this.etape = 0;
            this.dialog_index = 0;
            this.dialogs = {
                1: "M... Mais... Qu'est-ce que c'est que ça ?!"
            }
        }

        showImage(image, index) {
            let instance = this;
            setTimeout(function() {
                image.animate({
                    opacity: 1,
                }, {
                    duration: 750,
                    queue: true,
                    complete: function() {
                        if (index === 1) instance.showAfter();
                    }
                });
            }, index * 500);
        };

        cacherNav() {
            $('body').animate({
                backgroundColor: "black",
            }, {
                duration: 750,
            });

            let instance = this;
            $('nav').animate({
                top: "-=10em",
            }, {
                duration: 750,
                complete: function() {
                    $('.escape-bg-image').each(function(index) {
                        instance.showImage($(this), index);
                    });
                }
            });
        }

        showAfter() {
            let instance = this;
            $('.show-after').animate({
                opacity: 1,
            }, {
                duration: 750,
                complete: function() {
                    instance.floatelement($('#escape-dialogue'));
                    instance.floatelement($('#dialog-span'), 3.5);
                }
            });
        }

        floatelement(element, delta = 0, bottom = -0.5) {
            element.hover(function() {
                $(this).css('cursor', 'pointer');
            });
            let instance = this;
            element.animate({
                bottom: bottom + delta + 'em',
            }, {
                duration: 500,
                queue: false,
                complete: function() {
                    bottom *= -1;
                    instance.floatelement(element, delta, bottom);
                }
            });
        }

        nextDialog() {
            this.dialog_index++;
            $('#dialog-span').text(this.dialogs[this.dialog_index]);
        }

        init() {
            $('body').css('background-image', 'none');
            $('#content-wrapper').css('overflow-y', 'hidden');
            $('#dialog-span').css('left', parseFloat($('#escape-dialogue').css('left')) + 35 + "px");
            $('#dialog-span').css('bottom', '4.5em');
            this.cacherNav();
            this.nextDialog();
        }
    }
</script>
