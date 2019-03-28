(function ($) {
    let socket = {
        socketUrl: 'ws://127.0.0.1:8888',

        /**
         * Init  socket connection
         */
        init: function () {
            this.connect();
        },
        connect: function () {
            let socketConnection = new ab.Session(
                this.socketUrl,
                function () {
                    $(socket).trigger('socketInit', [socketConnection]);
                },
                function () {
                    console.warn('Connection is broken');
                    setTimeout(function () {
                        socket.connect();
                    }, 500);
                },
                {
                    'skipSubprotocolCheck': true
                }
            );
        }
    };

    let body = $('body');
    let map = body.find('.map-container');
    let tank = map.find('.tank');

    $(socket).on('socketInit', function (event, connection) {
        body.on('keydown', (e) => {
            if (!e.key.indexOf('Arrow')) {
                let direction = e.key.replace("Arrow", '').toLowerCase();
                tank
                    .removeClass('up left right down')
                    .addClass(direction);

                connection.publish('move', {
                    position: tank.parent().data(),
                    direction: direction
                });
            }
        });


        // connection.subscribe('message', function (topic, data) {
        //     $('#chat-messages').append($('li').text(data));
        // });
        //
        // $('#chat-form').on('submit', function () {
        //     var message = $(this).find('[name="message"]').val();
        //
        //     connection.publish('message', message);
        //
        //     return false;
        // });
    });
    socket.init();

})(jQuery);
