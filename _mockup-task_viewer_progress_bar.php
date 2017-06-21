<style>
#myProgressbar {
  width: 99% !important;
  background-color: rgba(92, 78, 212, 0.07);
  display: inline-block;
  height: 40px !important;
  vertical-align: -webkit-baseline-middle;
}
.progress-bar {
  background-color: #5C4ED4;
}

#taskContributionPoints {
  display: inline-block;
  /* border: 1px solid; */
  padding: 8.5px;
  font-size: large;
  vertical-align: top;
  color: rgba(92, 78, 212, 1);
  border-left: 0;
  margin-left: -58px;
  font-weight: 900;
  box-shadow: inset -1px 0.5px 0px 0px rgba(0,0,0,.03);
}
#progressMessage {
  font-size: 16px;
  vertical-align: middle;
  margin-top: 10px;
}
#progressSection {
  margin-bottom: 50px;
}
p {
  margin: 0px;
}


</style>

<h1>Progress Bar</h1>
<div id="progressSection">
  <div id="myProgressbar" class="progress">
   <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
     <p id="progressMessage">Nothing</p>
   </div>
  </div>
  <div id="taskContributionPoints">
    <p>2 CP</p>
  </div>
  <p>
     <button data-toggle="progressbar" data-target="#myProgressbar" data-value="reset" data-level="info" class="btn btn-default">Reset</button>
     <button data-toggle="progressbar" data-target="#myProgressbar" data-value="10" class="btn btn-default">Open</button>
     <button data-toggle="progressbar" data-target="#myProgressbar" data-value="33" class="btn btn-default">Begun</button>
     <button data-toggle="progressbar" data-target="#myProgressbar" data-value="80" class="btn btn-default">In Review</button>
     <button data-toggle="progressbar" data-target="#myProgressbar" data-value="100" class="btn btn-default">Completed</button>
  </p>
</div>

<script>
!function ($) {

    "use strict";

    // PROGRESSBAR CLASS DEFINITION
    // ============================

    var Progressbar = function (element) {
        this.$element = $(element);
    }

    Progressbar.prototype.update = function (value) {
        var $div = this.$element.find('div');
        var $span = $div.find('span');
        $div.attr('aria-valuenow', value);
        $div.css('width', value + '%');
        $span.text(value + '% Complete');
    }

    Progressbar.prototype.finish = function () {
        this.update(100);
    }

    Progressbar.prototype.reset = function () {
        this.update(0);
    }

    // PROGRESSBAR PLUGIN DEFINITION
    // =============================

    $.fn.progressbar = function (option) {
        return this.each(function () {
            var $this = $(this),
                data = $this.data('jbl.progressbar');

            if (!data) $this.data('jbl.progressbar', (data = new Progressbar(this)));
            if (typeof option == 'string') data[option]();
            if (typeof option == 'number') data.update(option);
        })
    };

    // PROGRESSBAR DATA-API
    // ====================

    $(document).on('click', '[data-toggle="progressbar"]', function (e) {
        var $this = $(this);
        var $target = $($this.data('target'));
        var value = $this.data('value');
        $("#progressMessage").html($this[0].innerHTML);

        if(value === 100) {
          $("#taskContributionPoints").css({ 'color': "rgba(255,255,255,1)", 'transition' : 'color .5s' });
        } else {
          $("#taskContributionPoints").css({ 'color': "rgba(92, 78, 212, 1)", 'transition' : 'color .5s' });
        }

        e.preventDefault();

        $target.progressbar(value);
    });



}(window.jQuery);
</script>
