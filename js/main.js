function fadingInHeadings(){
    $(":header").hide().fadeIn(1500);
}

function textIncreasingSizeAnimation(selector, sizeInEm){
    // Increasing size fade in animation on H2 Headings
    $(selector).each(function(){
        $(this).css("font-size", "0");
        $(this).animate({
            fontSize: sizeInEm+"em"
        }, 100, "swing");
    });
}

function addProjectShowDetailsButton(){
    // Adding show details button for all projects
    let $projectDetails = $("p.project-details");
    $projectDetails.hide();
    $projectDetails.parent().append("<button type=\"button\" class=\"btn btn-primary btn-sm\">Show Details</button>\n");
    $("#projects-table button").on("click", function(){
            $(this).prev().show();
            $(this).remove();
    })
}

function setup() {
    fadingInHeadings();
    textIncreasingSizeAnimation("h2", 2);
    textIncreasingSizeAnimation("h3", 1.75);
    addProjectShowDetailsButton();
}

// Main starts
setup();



