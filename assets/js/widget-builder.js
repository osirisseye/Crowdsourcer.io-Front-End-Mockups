var widgetType = {
  thumb: 1,
  banner: 2,
  button: 3,
};

var currentType;

$(function() {
    widgetBuilderSelect(widgetType.thumb);
    showHidePreview();
    prepareDimensionsInput();
});

function widgetBuilderSelect(type, showPreview, resetDimensions) {
    if(showPreview === undefined) {
        showPreview = true;
    }
    if(resetDimensions === undefined) {
        resetDimensions = false;
    }
    currentType = type;

    $('#thumb_selection').addClass(type == widgetType.thumb ? 'active' : '');
    $('#thumb_selection').removeClass(type != widgetType.thumb ? 'active' : '');
    $('#banner_selection').addClass(type == widgetType.banner ? 'active' : '');
    $('#banner_selection').removeClass(type != widgetType.banner ? 'active' : '');
    $('#button_selection').addClass(type == widgetType.button ? 'active' : '');
    $('#button_selection').removeClass(type != widgetType.button ? 'active' : '');

    var base_url = $('input:hidden[name=widget_builder_base_url]').val();
    var projname = $('input:hidden[name=widget_builder_name]').val();
    var projblurb = $('input:hidden[name=widget_builder_blurb]').val();
    var projid = $('input:hidden[name=widget_builder_projid]').val();
    
    var js_line = '<script async type="text/javascript" src="'+ base_url +'widgets/widget-js"></script>';
    if (type == widgetType.button) {
        var placeholder_line = '<a href="'+base_url+'/project/'+projid+'">Check out our project!</a>'
    }
    else {
        var placeholder_line = '<blockquote><h3>'+projname+'</h3><p>'+projblurb+'</p><a href="'+base_url+'/project/'+projid+'">Check out our project!</a></blockquote>'
    }

    if (resetDimensions) {
        $('#widget_width').val('');
        $('#widget_height').val('');
    }

    var width_val = checkDimensionType($('#widget_width').val());
    var height_val = checkDimensionType($('#widget_height').val());

    var width_text = width_val.valid ? ' data-width="' + width_val.value  + width_val.unit + '"' : '' ;
    var height_text = height_val.valid  ? ' data-height="' + height_val.value  + height_val.unit + '"' : '' ;
    var widget_line = '<div'+width_text + height_text+' data-type="'+ type +'" class="crowdsourcer-iframe-widget" data-id="'+ projid +'">'+placeholder_line+'</div>'

    $('#widget_code_preview').text(widget_line + "\n" + js_line);
    if (showPreview) {
        $('#widget_builder_preview').html(widget_line + js_line);
    }
}

function showHidePreview() {
    $('#prev_widg_chck').click(function() {
        if( $(this).is(':checked')) {
            $("#widget_builder_preview").show();
        } else {
            $("#widget_builder_preview").hide();
        }
    }); 
}

function prepareDimensionsInput() {
    var typingTimer;
    var doneTypingInterval = 2500;
    var $input = $('#widget_width, #widget_height');

    $input.on('keyup', function () {
        widgetBuilderSelect(currentType, false, false);
        clearTimeout(typingTimer);
        typingTimer = setTimeout(widgetDimensionsDoneTyping, doneTypingInterval);
    });

    $input.on('keydown', function () {
        clearTimeout(typingTimer);
    });
}

function widgetDimensionsDoneTyping () {
    widgetBuilderSelect(currentType, true, false);
}

function checkDimensionType(value) {
    var hasPx = value.indexOf('px') >= 0;
    var hasPct = value.indexOf('%') >= 0;
    if (hasPx) {
        value.replace('px', '');
    }
    else if (hasPct) {
        value.replace('p%', '');
    }

    if ((parseFloat(value) && !hasPct) || (hasPx && parseFloat(value))) {
        var max = 1200;
        if (value > max) {
            value = max
        }
        return {valid : true, unit: 'px', value: parseFloat(value)}
    }
    else if (parseFloat(value) && hasPct) {
        var max = 100;
        if (value > max) {
            value = max
        }
        return {valid : true, unit: '%', value: parseFloat(value) }        
    }
    else {
        return {valid : false, unit: '', value: NaN }        
    }
}