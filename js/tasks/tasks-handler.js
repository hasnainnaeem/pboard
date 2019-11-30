/*
    Written by M. Hasnain
 */

// getting jquery objects of elements ready
$listItemInput = $("input#to-be-input");
$listButton = $("button#add-to-be-list");
$list = $("ul#to-be-list");

$listItems = $list.find("li");
$listChildren = $listItems;
$("#to-be-list-h").append("<span>"+$listChildren.length+"</span>");

// Insert above an element which was clicked (if input box is empty nothing will be inserted)
$list.on("click", "li" ,function(){
    let $removeButton = $("<button class='btn btn-danger btn-sm'>Remove</button>");
    let $insertBelowButton = $("<button class='btn btn-info btn-sm'>Insert Below</button>");
    let $this = $(this);

    if($this.attr("class") !== "buttons-displayed") {
        $this.append($removeButton);
        $this.append($insertBelowButton);
        $this.attr("class", "buttons-displayed");

        $removeButton.css({
            "opacity": "0"
        });

        $insertBelowButton.css({
            "opacity": "0"
        });

        $removeButton.animate({                  // If so, animate opacity + padding
            height: "+=5",
            opacity: 1,
            marginRight: "+=10",
            marginTop: "-=12"
        }, 500, 'swing', function () {    // Use callback when animation completes
        });

        $insertBelowButton.animate({                  // If so, animate opacity + padding
            height: "+=5",
            opacity: 1,
            marginRight: "+=10",
            marginTop: "-=12"
        }, 500, 'swing', function () {    // Use callback when animation completes
        });

        $removeButton.on("click", function () {
            $(this).parent().animate({                  // If so, animate opacity + padding
                opacity: 0,
                marginRight: "-=40",
            }, 500, 'swing', function () {    // Use callback when animation completes
                $(this).remove();
                updateCount(-1);
            });
        });

        $insertBelowButton.on("click", function () {
            insertItem(false, $insertBelowButton.parent());
        });
    }
    else {
        $this.attr("class", "buttons-not-displayed");
        $this.children("button").animate({                  // If so, animate opacity + padding
            opacity: 0,
            marginRight: "-=10",
        }, 500, 'swing', function () {    // Use callback when animation completes
            $this.children("button").remove();
        });
    }
});

function insertItem(AtEnd = true, belowThisItem){
// Inserts new li item in the list
// when belowThisItem is given AtEnd should be false
    if ($listItemInput.val() !== ""){
        let itemText = "<li>" + $listItemInput.val() + "</li>";
        let $newItem = $(itemText);

        if(AtEnd)
            $list.append($newItem);
        else
            belowThisItem.after($newItem);

        $newItem.css({
            "opacity": "0",
            "position": "relative",
            "left": "+=50",
        });
        $newItem.animate({                  // If so, animate opacity + padding
            opacity: 1,
            left: 0
        }, 500, 'swing', function () {    // Use callback when animation completes
        });

        updateCount(1);
    }
}

function updateCount(num){
    let $countElement = $("#to-be-list-h").children("span");
    // add given number in counter element text (span)
    $countElement.text(parseInt($countElement.text()) + num);
}

// insert if Add To List button is flicked
$listButton.on("click", function() {
    insertItem();
});



let text;
let $elem;
$draggable = $(".draggable" );
$droppable = $('.droppable');
$draggable.draggable();
$draggable.on('mousedown', function(e){
    text = $(this).text();
    $elem = $(e.target);
});

$droppable.on('drop', function( event, ui ) {
    $elem.remove();
    let newItem = $('<li>'+text+'</li>');
    newItem.addClass('draggable');
    newItem.addClass('ui-widget-content');
    $( this ).find('ul').append(newItem);
    $draggable = $(".draggable" );
    $draggable.draggable();
    $draggable.on('mousedown', function(e){
        text = $(this).text();
        $elem = $(e.target);
    });
});

$droppable.droppable({
    out: function( event, ui ) {
    }
});
//
// let text;
// let $elem;
// $draggable = $(".draggable" );
// $droppable = $('.droppable');
// $draggable.draggable();
// $draggable.on('mousedown', function(e){
//     text = $(this).text();
//     $elem = $(e.target);
// });
//
// $droppable.on('drop', function( event, ui ) {
//     $elem.remove();
//     let newItem = $('<li>'+text+'</li>');
//     newItem.addClass('draggable');
//     newItem.addClass('ui-widget-content');
//     $( this ).find('ul').append(newItem);
//     $draggable = $(".draggable" );
//     $draggable.draggable();
//     $draggable.on('mousedown', function(e){
//         text = $(this).text();
//         $elem = $(e.target);
//     });
// });
//
// $droppable.droppable({
//     out: function( event, ui ) {
//     }
// });

$toDoList = $("#to-do ul");
$toDoButton = $("#add-to-do");
$toDoInput = $("#to-do-input");

$toDoButton.on("click", function(){
    let val = $toDoInput.val();
    if(val != ""){
        let $newItem = $('<li>'+val+'</li>')
        $newItem.attr("class", "ui-widget-content draggable" )
        $toDoList.append($newItem);
        $toDoInput.val('');
        $(".draggable").draggable();
        $droppable.droppable({
            out: function( event, ui ) {
            }
        });
    }
})

$toDoList2 = $("#to-do-2 ul");
$toDoButton2 = $("#add-to-do-2");
$toDoInput2 = $("#to-do-input-2");

$toDoButton2.on("click", function(){
    let val = $toDoInput2.val();
    if(val != ""){
        let $newItem = $('<li>'+val+'</li>')
        $newItem.attr("class", "ui-widget-content draggable" )
        $toDoList2.append($newItem);
        $toDoInput2.val('');
        $(".draggable").draggable();
        $droppable.droppable({
            out: function( event, ui ) {
            }
        });
    }
})


$toDoList3 = $("#to-do-3 ul");
$toDoButton3 = $("#add-to-do-3");
$toDoInput3 = $("#to-do-input-3");

$toDoButton3.on("click", function(){
    let val = $toDoInput3.val();
    if(val != ""){
        let $newItem = $('<li>'+val+'</li>')
        $newItem.attr("class", "ui-widget-content draggable" )
        $toDoList3.append($newItem);
        $toDoInput3.val('');
        $(".draggable").draggable();
        $droppable.droppable({
            out: function( event, ui ) {
            }
        });
    }
})

