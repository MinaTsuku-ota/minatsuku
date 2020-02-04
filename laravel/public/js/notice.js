function notice() {
    Push.create(" 通知だよ！", {
        body: "本文",
        icon: 'storage/avaters/default_avater.png',
        timeout: 4000,
        onClick: function () {
            location.href = 'https://yahoo.co.jp';
            this.close();
        }
    });
}
