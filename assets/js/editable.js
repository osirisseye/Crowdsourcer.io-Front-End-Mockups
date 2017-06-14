// jQuery.editable.js v1.1.2
// http://shokai.github.io/jQuery.editable
// (c) 2012-2015 Sho Hashimoto <hashimoto@shokai.org>
// The MIT License
(function($) {
    var escape_html = function(str) {
        return str.replace(/</gm, '&lt;').replace(/>/gm, '&gt;');
    };
    var unescape_html = function(str) {
        return str.replace(/&lt;/gm, '<').replace(/&gt;/gm, '>');
    };

    $.fn.editable = function(event, callback) {
        if (typeof callback !== 'function') callback = function() {};
        if (typeof event === 'string') {
            var trigger = this;
            var action = event;
            var type = 'input';
        } else if (typeof event === 'object') {
            var trigger = event.trigger || this;
            if (typeof trigger === 'string') trigger = $(trigger);
            var action = event.action || 'click';
            var type = event.type || 'input';
            var customWidth = event.width || 'width';
            var confirm = event.confirm || null;
            var cancel = event.cancel || null;
        } else {
            throw ('Argument Error - jQuery.editable("click", function(){ ~~ })');
        }

        var target = this;
        var edit = {};

        edit.start = function(e) {
            //            console.log("type: "+ type);

            console.log("rawValue: " + target.data('raw'))
            var raw = target.attr('data-raw');
            var isMarkupEdit = (raw !== undefined)

            trigger.unbind(action === 'clickhold' ? 'mousedown' : action);
            if (trigger !== target) trigger.hide();
            if (confirm) {
                confirm.unbind('click');
                confirm.show()
            };
            if (cancel) {
                cancel.unbind('click');
                cancel.show()
            };
            newtext = (raw === undefined) ? target.text() : JSON.parse(raw);
            var old_value = (
                type === 'textarea' ?
                newtext.replace(/<br( \/)?>/gm, '\n').replace(/&gt;/gm, '>').replace(/&lt;/gm, '<') : newtext
            ).replace(/^\s+/, '').replace(/\s+$/, '');

            //            console.log("oldvalue replaced: "+ old_value);

            var input = type === 'textarea' ? $('<textarea>') : $('<input>');
            input.val(old_value).
            css('width', customWidth ? customWidth : (type === 'textarea' ? '100%' : target.width() + target.height())).
            css('font-size', '100%').
            //            css('margin', 0).
            attr('id', 'editable_' + (new Date() * 1)).
            addClass('editable form-control');
            if (type === 'textarea') input.css('height', target.height());

            var finish = function() {
                var mdresult = input.val()
                var result = input.val().replace(/^\s+/, '').replace(/\s+$/, '');
                var html = escape_html(result);
                if (type == 'textarea' && !isMarkupEdit) html = nl2br(html);
                if (isMarkupEdit) {
                    var data = JSON.stringify(mdresult);
                    target.attr('data-raw', data)
                    target.html(marked(JSON.parse(data)))
                } else {
                    target.html(html);
                }
                callback({
                    value: result,
                    target: target,
                    old_value: old_value
                });
                edit.register();
                if (trigger !== target) trigger.show();
                if (confirm) confirm.hide();
                if (cancel) cancel.hide();
            };

            if (!confirm || !cancel) {
                console.log("blurring");
                input.blur(finish);
            } else {

                confirm.click(finish);
                cancel.click(function() {
                    var html = escape_html(old_value);
                    if (type == 'textarea' && !isMarkupEdit) html = nl2br(html);
                    console.log("oldvalue back: " + html);
                    if (isMarkupEdit) {
                        target.html(marked(JSON.parse(raw)))
                    } else {
                        target.html(html);
                    }
                    edit.register();
                    if (trigger !== target) trigger.show();
                    if (confirm) confirm.hide();
                    if (cancel) cancel.hide();
                });

            }

            if (type === 'input') {
                input.keydown(function(e) {
                    if (e.keyCode === 13) finish();
                });
            }

            target.html(input);
            input.focus();
        };

        edit.register = function() {
            if (action === 'clickhold') {
                var tid = null;
                trigger.bind('mousedown', function(e) {
                    tid = setTimeout(function() {
                        edit.start(e);
                    }, 500);
                });
                trigger.bind('mouseup mouseout', function(e) {
                    clearTimeout(tid);
                });
            } else {
                trigger.bind(action, edit.start);
            }
        };
        edit.register();

        return this;
    };
})(jQuery);

function nl2br(str, is_xhtml) {
    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
}
