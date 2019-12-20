jQuery(document).ready(function($) {

    //enabletootltip
    $('[data-toggle="tooltip"]').tooltip();

    $('.forecast-month-select').on('change', function() {

        $(this).closest('form').submit();
    });


    $('.filter_radio').on('change', function(event) {
        event.preventDefault();
        $(this).closest('form').submit();
    });

    $('.switch-view-checkbox').on('change', function(event) {
        event.preventDefault();

        $(this).closest('form').submit();

    });

});

//to display the matters
function getOutPut(data, title)
{
    var output = '<div class="list-group-item row heading">';
    output += '<div class="col-xs-4">Matter</div>';
    output += '<div class="col-xs-14">Address</div>';
    output += '<div class="col-xs-6 text-right">Compeleted %</div>';
    output += '</div>';
    output += '<div class="result">';

    $.each(data, function(key, val){
        // console.log(val);
        output += '<div class="list-group-item row">';
        output += '<a href="/stops52/convey/mattershomescreen.php?MatterNo='+val.MatterNo+'&ChapterNo=67&PageNo=0" target="_blank" class="right-float">';
        output += '<div class="col-xs-4">';
        output +=  val.MatterNo;
        output += '</div>';
        output += '<div class="col-xs-16">';
        output += val.PropertyDesc;
        output += '</div>';
        output += '<div class="col-xs-4 text-right">';
        output += val.completed_percentage;
        output += '</div>';
        output += '</a>';
        output +='</div>';

    });

    output += '</div>';

    swal({
        title: title,
        text: output,
        html: true,
        customClass: 'dashboard-sweetalert'
    });
}

/**
 * display for Instructiontype and ttenure type
 * @param  {[type]} id      id of the element
 * @param  {[type]} chart   [chartjs object]
 * @param  {[type]} allData [all company data]
 * @return {[type]}         [description]
 */
function displayMatterList(id, chart, allData)
{
    $('#'+id).on('click', function(event) {
        var activePoints = chart.getElementAtEvent(event);
        var clickedItem = activePoints[0]._model.datasetLabel;
        var clickedLabel = activePoints[0]._model.label;

        //get the position that is clicked
        var position = allData.Description.indexOf(clickedLabel);

        //get the matters
        var data = allData.Matters[clickedItem].Matters[position];

        var title = clickedLabel;

        // is undefined for items not categories as like sales purchases
        if(clickedItem)
        {
            title = title + ' - ' +clickedItem;
        }

        getOutPut(data, title);

    });
}

function opendialog (url, w, h)
{

    if (window.innerWidth)
        theWidth=window.innerWidth;
    else if (document.documentElement && document.documentElement.clientWidth)
        theWidth=document.documentElement.clientWidth;
    else if (document.body)
        theWidth=document.body.clientWidth;

    if (window.innerHeight)
        theHeight=window.innerHeight;
    else if (document.documentElement && document.documentElement.clientHeight)
        theHeight=document.documentElement.clientHeight;
    else if (document.body)
        theHeight=document.body.clientHeight;

    if (document.all) {
        var theLeft = window.screenLeft;
        var theTop = window.screenTop;
    }
    else {
        var theLeft = window.screenX;
        var theTop = window.screenY;
    }

    // Now determine whether the current window is on the left or right screen
    var theoffset=1100
    if (theLeft < 0)
    //  thePopupLeft=(screen.width/2)-200
        thePopupLeft=(screen.width/2)-720
    else if (theLeft < 100)
        thePopupLeft=(screen.width/2)-200;
    else
        thePopupLeft = (screen.width/2)+theoffset;


    // Fudge factors for window decoration space.
    // In my tests these work well on all platforms & browsers.

    //  wleft = ((1280 - w) / 2);
    wtop = ((1024 - h) / 2) - 140 ;

    var time = Date.now();

    var win = window.open(url, 'popup'+time, 'width=' + w + ', height=' + h + ', ' + 'left=' + thePopupLeft + ', top=' + wtop + ', ' + 'location=, menubar=no, ' + 'status=no, toolbar=no, scrollbars=no, resizable=yes');
    win.focus();

}
