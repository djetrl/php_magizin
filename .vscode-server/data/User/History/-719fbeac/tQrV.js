function login(){
  let log = $('#login').val()
  let pas = $('#passw').val()
  let token = $('#token').val()

  $.get('auth.php', {login: log, password: pas}, function (data){
    let otvet = JSON.parse(data);
localStorage.setItem(token, JSON);
    // если произошла ошибка
    if ('error' in otvet){
      alert(otvet['error', 'text'])
    }else if ('user' in otvet){
      alert('вы успешно авторизовались')
    }else{
      alert('непредвиденная ошибка');
      console.log(data);
    }
  })
}
