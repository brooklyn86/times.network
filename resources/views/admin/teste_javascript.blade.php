
<body>
    <p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p>
    <p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p>
    <p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p>
    <p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p>
    <p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p>
    <p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p>
    <p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p>
    <p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p>
    <p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p>
    <p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p>
    <p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p>
    <p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p>
    <p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p>
    <p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p>
    <p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p>
    <p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p>
    <p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p>
    <p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p>
    <p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p>
    <p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p><p>Teste</p>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

        <script type="text/javascript">
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);

            const source = urlParams.get('utmSource');
            const idmateria = urlParams.get('utmMedium');
            const refer = document.referrer;

            console.log('Refer é: ');
            console.log(refer);

            var is20seconds = false;
            var ip = '';

            var tout = setTimeout(setEnable20Seconds, 7000);

            function setEnable20Seconds() {
                is20seconds = true;
                console.log(is20seconds);
            }

            var didScroll = false;

            window.onscroll = () => didScroll = true;

            setInterval(() => {
                if ( didScroll ) {
                    //didScroll = true;
                }
            }, 250);

            setInterval(checkAllConditions, 1000);

            function checkAllConditions(){


                if(source != '' && idmateria != '' && is20seconds == true && didScroll == true){
                    console.log('passou');
                    console.log(source);
                    console.log(idmateria);
                    console.log(is20seconds);
                    console.log(didScroll);
                    console.log(ip);

                    chamaAjax();

                    clearTimeout(tout);
                    is20seconds = false;
                    didScroll = false;
                }
            }

            function chamaAjax(){
                const xhr = new XMLHttpRequest();
                const url = 'https://timesnews.network/contabiliza-acesso?source='+source+'&idmateria='+idmateria+'&ip='+ip+'&refer='+refer;

                xhr.open('GET', url);
                xhr.send();

                console.log('chamou o XMLHttpRequest');
                console.log('https://timesnews.network/contabiliza-acesso?source='+source+'&idmateria='+idmateria+'&ip='+ip+'&refer='+refer);
            }

            $(document).ready(function(e){
                $.ajax({
                    url: 'https://api.ipify.org/?format=json',
                    method: 'GET',
                    success: function(res){
                        console.log(res);
                        ip = res.ip
                    }
                });
            });
        </script>
</body>
