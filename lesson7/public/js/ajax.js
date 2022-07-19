
function addContentsOfCart(id, count = 1, action = 'add'){
    let str = 'id='+id+'&action='+action+'&count='+count;

    $.ajax({
        type: 'POST',
        url: '/engine/cart/changeContentsOfCart.php',
        data: str,
        success: function(data){//data - ответ сервера
            alert(data);
        }
    });
}

function updateSumPriceOfCart(id, action = 'update'){
    let selector = '#countGood' + id;
    let count = $(selector).val();
    let str = 'id='+id+'&action='+action+'&count='+count;

    $.ajax({
        type: 'POST',
        url: '/engine/cart/changeContentsOfCart.php',
        data: str,
        success: function(data){
            $('#sumPrice').html(data);

        }
    });
}


function removeGoodFromCart(id, action = 'delete'){
    let str = 'id='+id+'&action='+action;

    $.ajax({
        type: 'POST',
        url: '/engine/cart/changeContentsOfCart.php',
        data: str,
        success: function(){
            //сделал временно перезагрузку страницы потому что не понял как можно было бы сделать ререндер только таблицы в корзине
          location.reload();
        }
    });
}