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
                1: "M... Mais... Qu'est-ce que c'est que ça ?!",
                2: "J'y vois double... Mais littéralement !",
                3: "Il y a la chambre que je connais...",
                4: "Et l'autre, que s'est-il passé ?!",
                5: "Bon, on n'a pas vraiment eu le temps",
                6: "d'écrire d'autres dialogues",
                7: "Alors on laisse faire GithubCopilot",
                8: "pour nous aider à finir ce jeu.",
                9: "Mais en attendant, on va vous laisser",
                10: "et vous laisser découvrir la suite",
                11: "de l'histoire par vous-même.",
                12: "Ah non du coup il n'y a pas de suite...",
                13: "Ok Google raconte-moi une blague",
                14: "C'est l'histoire d'un pingouin qui respire par les fesses.",
                15: "Un jour il s'assoit et il meurt.",
                16: "Fin.",
                17: "Bon, on va vous laisser.",
                18: "A bientôt !",
            };
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
                    instance.floatelement($('#dialog-span'), 3.8);
                    instance.floatelement($('#cliquer-span'), 4);
                }
            });
            $('.dialog-element').on('click', function() {
                instance.nextDialog();
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
            if (this.dialog_index === 18) {
                this.dialog_index = 1;
            } else {
                this.dialog_index++;
            }
            $('#dialog-span').html('');
            $('#dialog-span').text(this.dialogs[this.dialog_index]);
        }

        init() {
            $('body').css('background-image', 'none');
            $('#content-wrapper').css('overflow-y', 'hidden');
            $('#dialog-span').css('left', parseFloat($('#escape-dialogue').css('left')) + 35 + "px");
            $('#dialog-span').css('bottom', parseFloat($('#escape-dialogue').css('bottom')) + 85 + "px");
            $('#cliquer-span').css('left', parseFloat($('#escape-dialogue').css('left')) + 405 + "px");
            $('#cliquer-span').css('bottom', parseFloat($('#escape-dialogue').css('bottom')) + 65 + "px");
            this.cacherNav();
            this.nextDialog();
        }
    }
</script>
