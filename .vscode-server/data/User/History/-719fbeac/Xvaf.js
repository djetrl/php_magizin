function login(){
  let log = $('#login').val()
  let pas = $('#passw').val()


  $.get('auth.php', {login: log, password: pas}, function (data){
    let otvet = JSON.parse(data);
    // если произошла ошибка
    if ('error' in otvet){
      alert(otvet['error', 'text'])
    }else if ('user' in otvet){
      alert('вы успешно авторизовались');
      localStorage.setItem(`token ${log}`, otvet.user.token);
    }else{
      alert('непредвиденная ошибка');
      console.log(data);
    }
  })
}

function register(){
  let log = $('#login').val();
  let pas = $('#passw').val();

  $.get('register.php', {login: log, password: pas }, function(data){
    let otvet = JSON.parse(data)
    alert('пользователь успешно зарегистрирован');
    setTimeout(function(){
      window.location.href = 'https://dzen.ru/?clid=2359100&yredirect=true';
    }, 400);
  });
}
