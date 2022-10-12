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
      localStorage.setItem(`token`, otvet.user.token);
      setTimeout(function(){
        window.location.href =`http://217.71.129.139:5443/get.pokupki.php?token=${localStorage.getItem('token', otvet.user.token)}`;
        }, 400); 
    }else{
      alert('непредвиденная ошибка');
      console.log(data);
    }
  })
}

function register(){
  let log = $('#login').val();
  let pas = $('#passw').val();
  let pas2 = $('#passw2').val();
  if (pas !== pas2) {
  $.get('register.php', {login: log, password: pas, pas2 }, function(data){
    
        let otvet = JSON.parse(data)
        alert('пользователь успешно зарегистрирован');
        setTimeout(function(){
          window.location.href = 'http://217.71.129.139:5443/login.html';
        }, 400);

  });
}else{
  alert('пароли не совпадают');
}
}
