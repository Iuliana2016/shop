(function($) {
    'use strict';

    $(function() {
        $('#feedback_form').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {
                    validators: {
                        stringLength: {
                            min: 2
                        },
                        notEmpty: {
                            message: 'Te rugam sa introduci numele tau'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Te rugam sa introduci adresa de email'
                        },
                        emailAddress: {
                            message: 'Te rugam sa introduci o adresa de email valida'
                        }
                    }
                },
                phone: {
                    validators: {
                        notEmpty: {
                            message: 'Te rugam sa introduci numarul de telefon'
                        },
                        phone: {
                            country: 'RO',
                            message: 'Te rugam sa introduci un numar de telefon valid'
                        }
                    }
                },
                message: {
                    validators: {
                        stringLength: {
                            min: 10,
                            max: 200,
                            message: 'Te rugam sa introduci un mesaj de minim 10 caractere si maxim 200'
                        },
                        notEmpty: {
                            message: 'Te rugam sa introduci mesajul tau'
                        }
                    }
                }
            }
        })
            .on('success.form.bv', function(e) {
                $('#success_message').slideDown({ opacity: "show" }, "slow");
                $('#feedback_form').data('bootstrapValidator').resetForm();

                // Prevent form submission
                e.preventDefault();

                // Get the form instance
                var $form = $(e.target);

                // Get the BootstrapValidator instance
                var bv = $form.data('bootstrapValidator');

                $.post($form.attr('action'), $form.serialize(), function(result) {
                    console.log(result);
                }, 'json');
            });


        $('#checkout_form').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {
                    validators: {
                        stringLength: {
                            min: 2
                        },
                        notEmpty: {
                            message: 'Te rugam sa introduci numele tau'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Te rugam sa introduci adresa de email'
                        },
                        emailAddress: {
                            message: 'Te rugam sa introduci o adresa de email valida'
                        }
                    }
                },
                phone: {
                    validators: {
                        notEmpty: {
                            message: 'Te rugam sa introduci numarul de telefon'
                        },
                        phone: {
                            country: 'RO',
                            message: 'Te rugam sa introduci un numar de telefon valid'
                        }
                    }
                },
                address: {
                    validators: {
                        notEmpty: {
                            message: 'Te rugam sa introduci adresa ta'
                        }
                    }
                },
                zip: {
                    validators: {
                        stringLength: {
                            min: 4,
                            max: 4,
                            message: 'Te rugam sa introduci un cod postal valid'
                        },
                        notEmpty: {
                            message: 'Te rugam sa introduci codul postal'
                        }
                    }
                },
                city: {
                    validators: {
                        notEmpty: {
                            message: 'Te rugam sa introduci orasul tau'
                        }
                    }
                }
            }
        })
            .on('success.form.bv', function(e) {
                $('#checkout_form').data('bootstrapValidator').resetForm();

                // Prevent form submission
                e.preventDefault();

                // Get the form instance
                var $form = $(e.target);

                // Get the BootstrapValidator instance
                var bv = $form.data('bootstrapValidator');

                $.post($form.attr('action'), $form.serialize(), function(result) {
                    console.log(1);
                }, 'json');

                setTimeout(function(){ location.href = location.protocol + "//" + location.host + '/index.php'; }, 500);
            });
    });
}(jQuery));