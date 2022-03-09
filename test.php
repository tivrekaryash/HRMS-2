<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    
    <script>
        $(document).on("click", "button", function() {
        var button = document.getElementById('my_btn');
            var time = 25;
            var timer = setInterval(function() {
              if (time > 0) {
                time--;
                button.disabled = true;
                button.innerHTML = 'Please wait for '+time+ ' miliseconds' ;
                console.log(time);
              }
              if (time === 0) {
                button.disabled = false;
                button.innerHTML = 'Press Me' ;
                clearInterval(timer);
              }
            }, 100);
        });
    </script>
    <title>Document</title>
</head>
<body>
    <button id="my_btn">Press Here!</button>
</body>
</html>