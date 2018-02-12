'use strict';

   var test = $('#meal').on('change', onChangeExecute);
   var click = $('#envoyer').on('click', onSendOrder);
   var message;
   var orders = loadDataFromDomStorage("order");
   var currentMeal;
   VerifyArray();
   basketStorage();

function onChangeExecute()
{
    message = $("#meal option:selected").val();
    $.getJSON(getRequestUrl()+"/select?id="+message, onReturnAjaxMeal );

}

function onReturnAjaxMeal(meal) {
        currentMeal = meal;
    /*sera appelé lorsque que le sendResponse est effectué*/
        $('#ajax').empty();
        var p = $("<p>");
        var prix = $("<p>");
        p.attr("id","text");
        prix.attr("id","prix");
        p.text(meal.description);
        prix.text("Prix : "+meal.sell_price +" €");

        var image = $("<img>");
        image.attr("src", getWwwUrl()+"/"+meal.photos);
        $('#ajax').append(image).append(p).append(prix);

}

function onSendOrder() {
    var quantity = parseInt($("input[name=quantity]").val());
    currentMeal.quantity = quantity;

    var mealEdit = orders.find(function(obj){
       return obj.name === currentMeal.name;
    });

    if (mealEdit != undefined){
        mealEdit.quantity += quantity;
    }
    else{
        orders.push(currentMeal);
    }
    saveDataToDomStorage("order",orders);
    basketStorage();
}

function basketStorage() {
    orders = loadDataFromDomStorage("order");
    VerifyArray();

    var i = 0;
    $(".basket").empty();
    orders.forEach(function(order){
        var name = $("<p>");
        var empty = $("<p>");
        var quantity = $("<p>");
        var price = $("<p>");
        var tot = $("<p>");
        var suppr = $("<i>");
        var br = $("<br/>");

        name.attr("class","nom");
        empty.attr("class","vide");
        quantity.attr("class","qte");
        price.attr("class","prix");
        tot.attr("class","total");
        suppr.attr("class","poubelle");

        suppr.attr("class","fa fa-trash");
        suppr.on("click",supprLigne);

        tot.text(order.sell_price * order.quantity+ " €");
        quantity.text(order.quantity);
        name.text(order.name);
        price.text(order.sell_price + " € ");
        suppr.data("position",i);
        $(".basket").append(quantity).append(name).append(empty).append(price).append(tot).append(suppr).append(br);
        i++;
    });
}

function supprLigne(){
    orders = loadDataFromDomStorage("order");
    VerifyArray();

    var index = $(this).data("position");
    orders.splice(index,1);
    saveDataToDomStorage("order",orders);
    basketStorage();
}


function postJSON() {
    var panier = {"orders" : orders};
    $.post(getRequestUrl()+"/basket",panier,returnPostBasket);
}

function returnPostBasket(id) {
    window.location.assign(getRequestUrl()+"/validation?id="+JSON.parse(id));
}

function VerifyArray(){
    if (orders == null){
        orders = [];
    }
}

message = $("#meal option:selected").val();
$.getJSON(getRequestUrl()+"/select?id="+message, onReturnAjaxMeal );
$("#run").on("click",postJSON);