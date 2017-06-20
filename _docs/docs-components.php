<?php
    // Use this space to change the default page variables.
    // $loggedin = true;
    
    // Leave this in, loads all state and style.
    require_once("../includes/mission_control_config.php");
    require_once("../partials/header.php");
    require_once("../partials/mission_control_top.php");


    // Custom PHP goes here...
?>

    <h1 class="text-center vmarg-sm">Common Components</h1>

    <div class="even_gutter row">
        <div class="even_gutter col-sm-12 col-xs-12">
            <div class="card vmarg-xs">
                <div class="card-header">
                    Button
                </div>
                <div class="card-body card-body-padding">
                    <div class="section">
                        <div class="section-body">
                            <div>
                                <button type="button" class="btn btn-default">Default</button>
                                <button type="button" class="btn btn-primary">Primary</button>
                                <button type="button" class="btn btn-success">Success</button>
                                <button type="button" class="btn btn-info">Info</button>
                                <button type="button" class="btn btn-warning">Warning</button>
                                <button type="button" class="btn btn-danger">Danger</button>
                                <button type="button" class="btn btn-link">Link</button>
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Dropdown <span class="caret"></span></button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="section">
                        <div class="section-title">Sizing</div>
                        <div class="section-body">
                            <button type="button" class="btn btn-default btn-lg">Large</button>
                            <button type="button" class="btn btn-default">Normal</button>
                            <button type="button" class="btn btn-default btn-sm">Small</button>
                            <button type="button" class="btn btn-default btn-xs">Extra Small</button>
                        </div>
                    </div>
                    <div class="section">
                        <div class="section-title">Social</div>
                        <div class="section-body">
                            <button type="button" class="btn btn-default btn-social __facebook">
      <div class="info">
        <i class="icon fa fa-facebook-official" aria-hidden="true"></i>
        <span class="title">Facebook</span>
      </div>
    </button>
                            <button type="button" class="btn btn-default btn-sm btn-social __twitter">
      <div class="info">
        <i class="icon fa fa-twitter" aria-hidden="true"></i>
        <span class="title">Twitter</span>
      </div>
    </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="even_gutter col-sm-12 col-xs-12">
            <div class="card vmarg-xs">
                <div class="card-header">
                    Alert
                </div>
                <div class="card-body card-body-padding">
                    <div class="even_gutter row">
                        <div class="even_gutter col-md-6 col-sm-12">
                            <div class="alert alert-success" role="alert">
                                <strong>Well done!</strong> You successfully read <a href="#" class="alert-link">this important alert message.</a>
                            </div>
                        </div>
                        <div class="even_gutter col-md-6 col-sm-12">
                            <div class="alert alert-info" role="alert">
                                <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
                            </div>
                        </div>
                        <div class="even_gutter col-md-6 col-sm-12">
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Warning!</strong> Better check yourself, you're not looking too good.
                            </div>
                        </div>
                        <div class="even_gutter col-md-6 col-sm-12">
                            <div class="alert alert-danger  alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Oh snap!</strong> Change a few things up and try submitting again.
                            </div>
                        </div>
                        <div class="even_gutter col-md-6 col-sm-12">
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 id="oh-snap!-you-got-an-error!">Oh snap! You got an error!<a class="anchorjs-link" href="#oh-snap!-you-got-an-error!"><span class="anchorjs-icon"></span></a></h4>
                                <p>Change this and that and try again. Duis mollis, est non commodo luctus, nisi erat porttitor
                                    ligula, eget lacinia odio sem nec elit.</p>
                                <p>
                                    <button type="button" class="btn btn-danger">Take this action</button>
                                    <button type="button" class="btn btn-link">Or do this</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="even_gutter col-sm-12 col-xs-12">
            <div class="card vmarg-xs">
                <div class="card-header">
                    Progress Bar
                </div>
                <div class="card-body card-body-padding">
                    <div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                style="width: 40%">
                                <span class="sr-only">40% Complete (success)</span>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                <span class="sr-only">20% Complete</span>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                aria-valuemax="100" style="width: 60%">
                                <span class="sr-only">60% Complete (warning)</span>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger  progress-bar-striped active" role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                aria-valuemax="100" style="width: 80%">
                                <span class="sr-only">80% Complete (danger)</span>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" style="width: 35%">
                                <span class="sr-only">35% Complete (success)</span>
                            </div>
                            <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 20%">
                                <span class="sr-only">20% Complete (warning)</span>
                            </div>
                            <div class="progress-bar progress-bar-danger" style="width: 10%">
                                <span class="sr-only">10% Complete (danger)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="even_gutter col-sm-6 col-xs-12">
            <div class="card vmarg-xs">
                <div class="card-header">
                    Pagination
                </div>
                <div class="card-body card-body-padding">
                    <nav>
                        <ul class="pagination">
                            <li>
                                <a href="#" aria-label="Previous">
        <span aria-hidden="true">«</span>
      </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                                <a href="#" aria-label="Next">
        <span aria-hidden="true">»</span>
      </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="even_gutter col-sm-6 col-xs-12">
            <div class="card vmarg-xs">
                <div class="card-header">
                    Label
                </div>
                <div class="card-body card-body-padding">
                    <span class="label label-default">Default</span>
                    <span class="label label-primary">Primary</span>
                    <span class="label label-success">Success</span>
                    <span class="label label-info">Info</span>
                    <span class="label label-warning">Warning</span>
                    <span class="label label-danger">Danger</span>
                </div>
            </div>
        </div>
        <div class="even_gutter col-sm-12 col-xs-12">
            <div class="card vmarg-xs">
                <div class="card-header">
                    List
                </div>
                <div class="card-body card-body-padding">
                    <div class="even_gutter row">
                        <div class="even_gutter col-sm-6">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
        <span class="badge">14</span> Cras justo odio
      </a>
                                <a href="#" class="list-group-item">
        <span class="badge">1</span> Morbi leo risus
      </a>
                                <a href="#" class="list-group-item list-group-item-success">
        <span class="badge badge-success">4</span> Vestibulum at eros
      </a>
                                <a href="#" class="list-group-item list-group-item-info">
        <span class="badge badge-info">5</span> Vestibulum at eros
      </a>
                                <a href="#" class="list-group-item list-group-item-warning">
        <span class="badge badge-warning">2</span> Vestibulum at eros
      </a>
                                <a href="#" class="list-group-item list-group-item-danger">
        Vestibulum at eros
      </a>
                            </div>
                        </div>
                        <div class="even_gutter col-sm-6">
                            <div class="list-group __timeline">
                                <a href="#" class="list-group-item">
        <span class="badge badge-success">14</span> Cras justo odio
      </a>
                                <a href="#" class="list-group-item">
        <span class="badge badge-success">1</span> Morbi leo risus
      </a>
                                <a href="#" class="list-group-item">
        <span class="badge badge-success">2</span> Vestibulum at eros
      </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="even_gutter col-sm-12 col-xs-12">
            <div class="card vmarg-xs">
                <div class="card-header">
                    Tab &amp; Step
                </div>
                <div class="card-body card-body-padding">
                    <div class="section">
                        <div class="section-title">Tab</div>
                        <div class="section-body">
                            <div role="tabpanel">
                                <!-- Nav tabs -->
                                <ul id="tabs-4" class="nav nav-tabs nav-tabs-v3" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
                                    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home">
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna
                                        aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper
                                        suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure
                                        dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu
                                        feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit
                                        praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam
                                        liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod
                                        mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis
                                        in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere
                                        me
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="profile">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                        tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                                        quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                                        consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                                        consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et
                                        iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore
                                        te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue
                                        nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent
                                        claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes
                                        d
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="messages">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                        tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                                        quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                                        consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                                        consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et
                                        iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore
                                        te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue
                                        nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent
                                        claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes
                                        demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam
                                        processus dynamicus, qui sequitur mutationem consuetudium </div>
                                    <div role="tabpanel" class="tab-pane" id="settings">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                        tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                                        quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                                        consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                                        consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et
                                        iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore
                                        te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue
                                        nihil imperdiet doming id quod mazim placerat facer possim assum. </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="even_gutter col-sm-12 col-xs-12">
            <div class="card vmarg-xs">
                <div class="card-header">
                    Modal
                </div>
                <div class="card-body card-body-padding">
                    <div class="even_gutter row">
                        <div class="even_gutter col-sm-12">
                            <div>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
      Demo modal
      </button>
                            </div>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Modal title</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                                euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi
                                                enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis
                                                nisl
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-sm btn-success">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="simplio-example __modal">
                                <div class="modal in">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                <h4 class="modal-title">Modal title</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                                                    nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                                    Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper
                                                    suscipit lobortis nisl</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-sm btn-success">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h1 class="text-center vmarg-sm">Cards</h1>

    <div class="even_gutter row">
        <div class="even_gutter col-md-12">
            <div class="card vmarg-xs">
                <div class="card-header">
                    <div class="card-title">Card</div>
                    <ul class="card-action">
                        <li class="dropdown">
                            <a href="/" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-cogs" aria-hidden="true"></i>
              </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action 1</a></li>
                                <li><a href="#">Action 2</a></li>
                                <li><a href="#">Action 3</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="card-body card-body-padding">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                    laborum.
                </div>
            </div>
        </div>
        <div class="even_gutter col-md-6">
            <div class="card vmarg-xs">
                <div class="card-header">
                    Card Table
                </div>
                <div class="card-body no-padding">
                    <div class="table-responsive">
                        <table class="table card-table">
                            <thead>
                                <tr>
                                    <th>Products</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>MicroSD 64Gb</td>
                                    <td>2</td>
                                    <td><span class="badge badge-success badge-icon"><i class="fa fa-check" aria-hidden="true"></i><span>Complete</span></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>MiniPC i5</td>
                                    <td>5</td>
                                    <td><span class="badge badge-warning badge-icon"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Pending</span></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mountain Bike</td>
                                    <td>1</td>
                                    <td><span class="badge badge-info badge-icon"><i class="fa fa-credit-card" aria-hidden="true"></i><span>Confirm Payment</span></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Notebook</td>
                                    <td>1</td>
                                    <td><span class="badge badge-danger badge-icon"><i class="fa fa-times" aria-hidden="true"></i><span>Cancelled</span></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Raspberry Pi2</td>
                                    <td>6</td>
                                    <td><span class="badge badge-primary badge-icon"><i class="fa fa-truck" aria-hidden="true"></i><span>Shipped</span></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Flashdrive 128Mb</td>
                                    <td>4</td>
                                    <td><span class="badge badge-info  badge-icon"><i class="fa fa-credit-card" aria-hidden="true"></i><span>Confirm Payment</span></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="even_gutter col-md-6">
            <div class="card card-mini">
                <div class="card-header">
                    Card Mini
                </div>
                <div class="card-body card-body-padding">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                </div>
            </div>
        </div>
        <div class="even_gutter col-md-6">
            <div class="card card-tab card-mini">
                <div class="card-header">
                    <ul class="nav nav-tabs">
                        <li role="tab1" class="active">
                            <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Card Tab 1</a>
                        </li>
                        <li role="tab2">
                            <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Card Tab 2</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body tab-content no-padding">
                    <div role="tabpanel" class="tab-pane active" id="tab1">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab2">
                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                        dolore eu fugiat nullaip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                        velit esse cillum dolore eu fugiat nullaip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                        in voluptate velit esse cillum dolore eu fugiat nulla
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h1 class="text-center vmarg-sm">Other</h1>


        <div class="even_gutter row">
            <div class="even_gutter col-md-12">
                <div class="card vmarg-xs">
                    <div class="card-header">
                        Basic Elements
                    </div>
                    <div class="card-body card-body-padding">
                        <div class="even_gutter row">
                            <div class="even_gutter col-md-6">
                                <input type="text" class="form-control" placeholder="Input">
                                <textarea name="name" rows="3" class="form-control"></textarea>
                                <input type="text" class="form-control" placeholder="Disabled" disabled="">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">
        <i class="fa fa-user" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" placeholder="Input group" aria-describedby="basic-addon1" value="">
                                </div>
                                <div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="checkbox1">
                                        <label for="checkbox1">
            Checkbox
        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="checkbox2">
                                        <label for="checkbox2">
            Checkbox Square
        </label>
                                    </div>
                                </div>
                                <div>
                                    <div class="checkbox checkbox-inline">
                                        <input type="checkbox" id="checkbox3">
                                        <label for="checkbox3">
            Checkbox Inline
        </label>
                                    </div>
                                    <div class="checkbox checkbox-inline">
                                        <input type="checkbox" id="checkbox4">
                                        <label for="checkbox4">
            Checkbox Inline
        </label>
                                    </div>
                                </div>
                                <div>
                                    <div class="radio">
                                        <input type="radio" name="radio2" id="radio3" value="option1">
                                        <label for="radio3">
              One
          </label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="radio2" id="radio4" value="option2" checked="">
                                        <label for="radio4">
              Two
          </label>
                                    </div>
                                </div>
                                <div>
                                    <div class="radio radio-inline">
                                        <input type="radio" name="radio2" id="radio5" value="option1">
                                        <label for="radio5">
              One
          </label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <input type="radio" name="radio2" id="radio6" value="option2" checked="">
                                        <label for="radio6">
              Two
          </label>
                                    </div>
                                </div>
                            </div>
                            <div class="even_gutter col-md-6">
                                <div class="form-group has-success">
                                    <input type="text" class="form-control" id="inputSuccess1" placeholder="Success">
                                </div>
                                <div class="form-group has-warning">
                                    <input type="text" class="form-control" id="inputWarning1" placeholder="Warning">
                                </div>
                                <div class="form-group has-error">
                                    <input type="text" class="form-control" id="inputError1" placeholder="Danger">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="even_gutter col-md-12">
                <div class="card vmarg-xs">
                    <div class="card-header">
                        Form Horizontal
                    </div>
                    <div class="card-body card-body-padding">
                        <form class="form form-horizontal">
                            <div class="section">
                                <div class="section-title">Information</div>
                                <div class="section-body">
                                    <div class="form-group">
                                        <label class="even_gutter col-md-3 control-label">Name</label>
                                        <div class="even_gutter col-md-9">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="even_gutter col-md-3">
                                            <label class="control-label">Description</label>
                                            <p class="control-label-help">( short detail of products , 150 max words )</p>
                                        </div>
                                        <div class="even_gutter col-md-9">
                                            <textarea class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="even_gutter col-md-3 control-label">Price</label>
                                        <div class="even_gutter col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">$</span>
                                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="section">
                                <div class="section-title">Warranty</div>
                                <div class="section-body">
                                    <div class="form-group">
                                        <label class="even_gutter col-md-3 control-label">Type</label>
                                        <div class="even_gutter col-md-9">
                                            <div class="radio radio-inline">
                                                <input type="radio" name="radio4" id="radio10" value="option10">
                                                <label for="radio10">
                Global
              </label>
                                            </div>
                                            <div class="radio radio-inline">
                                                <input type="radio" name="radio4" id="radio11" value="option11" checked="">
                                                <label for="radio11">
                Local
              </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-footer">
                                <div class="form-group">
                                    <div class="even_gutter col-md-9 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="button" class="btn btn-default">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <? require_once($_SERVER["DOCUMENT_ROOT"] . "/partials/footer.php"); ?>