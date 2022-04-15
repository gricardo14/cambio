<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>Hola HTML</title>
  </head>
  <!--Insertar el siguiente código javascript antes de la etiqueta</body> -->
<script>
  var configuracion  = {
    "indicadores" : [{"nombre":"DÓLAR","id":"158"}],
    "uriServices" : 'https://sidof.segob.gob.mx/dof/sidof',
    "color" :   "#393c3e"
  };

  (function () {
    if (typeof jQuery === 'undefined') {
      var script = document.createElement('SCRIPT');
      script.src = 'http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js';
      script.type = 'text/javascript';
      document.getElementsByTagName('head')[0].appendChild(script);
      setTimeout(function () {
        widget.getConfiguration();
        }, 1000);
      }
    else {
      setTimeout(function () {
        widget.getConfiguration();
        }, 1000);
      }
    })();

  var widget = {
    dom: null,
    types: null,
    lista: null,
    idActuales: [],
    getConfiguration: function () {
      widget.loadScript();
      widget.getIdIndicadores();
      $('.dof-content').addClass('container-fluid');
      },
    callServices: function () {
      },
    loadScript: function () {
      if (!widget.shearchJS('bootstrap')) {
        $.getScript('http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js', function (data, textStatus, jqxhr) {});
        }
      if (!widget.shearchCS('bootstrap')) {
        $('<link/>', {
          rel: 'stylesheet',
          type: 'text/css',
          href: 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'
          }).appendTo('head');

        $('<link/>', {
          rel: 'stylesheet',
          type: 'text/css',
          href: 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css'
          }).appendTo('head');

        $('<link/>', {
          rel: 'stylesheet',
          type: 'text/css',
          href: 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css'
          }).appendTo('head');

        $('<link/>', {
          rel: 'stylesheet',
          type: 'text/css',
          href: 'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'
          }).appendTo('head');
        }

      $('<style>').append('.box{position:relative;border-radius:3px;background:#fff;border-top:3px solid #d2d6de;margin-bottom:20px;width:100%;box-shadow:0 1px 1px rgba(0,0,0,0.1)}.box.collapsed-box .box-body,.box.collapsed-box .box-footer{display:none}.box .nav-stacked > li{border-bottom:1px solid #f4f4f4;margin:0}.box .nav-stacked > li:last-of-type{border-bottom:none}.box.height-control .box-body{max-height:300px;overflow:auto}.box .border-right{border-right:1px solid #f4f4f4}.box .border-left{border-left:1px solid #f4f4f4}.box.box-solid{border-top:0}.box.box-solid > .box-header .btn.btn-default{background:transparent}.box.box-solid > .box-header .btn:hover,.box.box-solid > .box-header a:hover{background:rgba(0,0,0,0.1)}.box.box-solid.box-default{border:1px solid #d2d6de}.box.box-solid.box-default > .box-header{color:#444;background:#d2d6de;background-color:#d2d6de}.box.box-solid.box-default > .box-header a,.box.box-solid.box-default > .box-header .btn{color:#444}.box.box-solid.box-primary{border:1px solid #3c8dbc}.box.box-solid.box-primary > .box-header{color:#fff;background:#3c8dbc;background-color:#3c8dbc}.box.box-solid.box-primary > .box-header a,.box.box-solid.box-primary > .box-header .btn{color:#fff}.box.box-solid.box-info{border:1px solid #00c0ef}.box.box-solid.box-info > .box-header{color:#fff;background:#00c0ef;background-color:#00c0ef}.box.box-solid.box-info > .box-header a,.box.box-solid.box-info > .box-header .btn{color:#fff}.box.box-solid.box-danger{border:1px solid #dd4b39}.box.box-solid.box-danger > .box-header{color:#fff;background:#dd4b39;background-color:#dd4b39}.box.box-solid.box-danger > .box-header a,.box.box-solid.box-danger > .box-header .btn{color:#fff}.box.box-solid.box-warning{border:1px solid #f39c12}.box.box-solid.box-warning > .box-header{color:#fff;background:#f39c12;background-color:#f39c12}.box.box-solid.box-warning > .box-header a,.box.box-solid.box-warning > .box-header .btn{color:#fff}.box.box-solid.box-success{border:1px solid #00a65a}.box.box-solid.box-success > .box-header{color:#fff;background:#00a65a;background-color:#00a65a}.box.box-solid.box-success > .box-header a,.box.box-solid.box-success > .box-header .btn{color:#fff}.box.box-solid > .box-header > .box-tools .btn{border:0;box-shadow:none}.box.box-solid[class*=\'bg\'] > .box-header{color:#fff}.box .box-group > .box{margin-bottom:5px}.box .knob-label{text-align:center;color:#333;font-weight:100;font-size:12px;margin-bottom:.3em}.box > .overlay,.overlay-wrapper > .overlay,.box > .loading-img,.overlay-wrapper > .loading-img{position:absolute;top:0;left:0;width:100%;height:100%}.box .overlay,.overlay-wrapper .overlay{z-index:50;background:rgba(255,255,255,0.7);border-radius:3px}.box .overlay > .fa,.overlay-wrapper .overlay > .fa{position:absolute;top:50%;left:50%;margin-left:-15px;margin-top:-15px;color:#000;font-size:30px}.box .overlay.dark,.overlay-wrapper .overlay.dark{background:rgba(0,0,0,0.5)}.box-header:before,.box-body:before,.box-footer:before,.box-header:after,.box-body:after,.box-footer:after{content:\' \';display:table}.box-header:after,.box-body:after,.box-footer:after{clear:both}.box-header{color:#444;display:block;padding:10px;position:relative}.box-header.with-border{border-bottom:1px solid #f4f4f4}.collapsed-box .box-header.with-border{border-bottom:none}.box-header > .fa,.box-header > .glyphicon,.box-header > .ion,.box-header .box-title{display:inline-block;font-size:18px;margin:0;line-height:1}.box-header > .fa,.box-header > .glyphicon,.box-header > .ion{margin-right:5px}.box-header > .box-tools{position:absolute;right:10px;top:5px}.box-header > .box-tools [data-toggle=\'tooltip\']{position:relative}.box-header > .box-tools.pull-right .dropdown-menu{right:0;left:auto}.box-body{border-top-left-radius:0;border-top-right-radius:0;border-bottom-right-radius:3px;border-bottom-left-radius:3px;padding:10px}.no-header .box-body{border-top-right-radius:3px;border-top-left-radius:3px}.box-body > .table{margin-bottom:0}.box-body .fc{margin-top:5px}.box-body .full-width-chart{margin:-19px}.box-body.no-padding .full-width-chart{margin:-9px}.box-body .box-pane{border-top-left-radius:0;border-top-right-radius:0;border-bottom-right-radius:0;border-bottom-left-radius:3px}.box-body .box-pane-right{border-top-left-radius:0;border-top-right-radius:0;border-bottom-right-radius:3px;border-bottom-left-radius:0}.box-footer{border-top-left-radius:0;border-top-right-radius:0;border-bottom-right-radius:3px;border-bottom-left-radius:3px;border-top:1px solid #f4f4f4;padding:10px;background-color:#fff}.box-comments{background:#f7f7f7}.box-comments .box-comment{padding:8px 0;border-bottom:1px solid #eee}.box-comments .box-comment:before,.box-comments .box-comment:after{content:\' \';display:table}.box-comments .box-comment:after{clear:both}.box-comments .box-comment:last-of-type{border-bottom:0}.box-comments .box-comment:first-of-type{padding-top:0}.box-comments .box-comment img{float:left}.box-comments .comment-text{margin-left:40px;color:#555}.box-comments .username{color:#444;display:block;font-weight:600}.box-comments .text-muted{font-weight:400;font-size:12px}').appendTo('head');
      },
    shearchJS: function (nameJs) {

        var bootstrapjs = false;
        for (var i = 0, scs; scs = document.getElementsByTagName('script')[i]; i++) {
          if (scs.src.indexOf(nameJs) > -1) {
            bootstrapjs = true;
          }
        }

        return bootstrapjs;
      },
    shearchCS: function (nameCss) {

        var bootstrapcs = false;
        for (var i = 0, scs; scs = document.getElementsByTagName('link')[i]; i++) {
          if (scs.href.indexOf(nameCss) > -1) {
            bootstrapcs = true;
          }
        }

        return bootstrapcs;
      },
    generateListIndicators : function(){
      widget.lista = $('<ul>', {class: 'nav nav-stacked'});
        var date = new Date();
        var actualMonth = date.getMonth()+1;
        if(actualMonth<10) {actualMonth = '0'+actualMonth;}
        var today = date.getDate() + '-' + actualMonth + '-' + date.getFullYear();
        console.log(configuracion.uriServices + '/indicadores/'+today);
        $.ajax({
          url: configuracion.uriServices + '/indicadores/'+today,
          'dataType': 'jsonp'
        }).then(function(data) {

console.log(data);
          $.each(data.ListaIndicadores, function (j, w) {

            for(var inde = 0; inde < widget.idActuales.length; inde++){
              if(widget.idActuales[inde].id == w.codTipoIndicador){
                widget.lista.append(
                $('<li>').append(
                  $('<a>', {href: 'javascript:void(0)'}).append(
                    widget.idActuales[inde].nombre,
                    $('<span>', {class: 'pull-right badge', style : 'background-color: ' + configuracion.color + ' !important;'}).append(w.valor)
                      )
                      )
                      );
                    }
                  }
                });
              });

              setTimeout(function () {
                widget.initComponent();
              }, 3000);
            },

    getIdIndicadores : function(){

      console.log(configuracion.uriServices + '/catalogos/cat_tipos_indicadores');
      $.ajax({
        url: configuracion.uriServices + '/catalogos/cat_tipos_indicadores',
        'dataType': 'jsonp'
      }).then(function(data) {
        // console.log(data);
        var i = 0;
        $.each(data.lista, function (j, w) {

          $.each(configuracion.indicadores, function (i, v) {

            if(w.value == v.nombre){
              widget.idActuales[i] = {'id' : w.id, 'nombre': v.nombre};
              i++;
            }
          });

        });

      });

      setTimeout(function () {
        widget.generateListIndicators();
      }, 300);

    },

    initComponent: function () {
      widget.dom = $('<div>', {class: 'col-md-12'}).append(
        $('<div>', {class: 'box box-default direct-chat direct-chat-primary', style : 'border-top-color: ' + configuracion.color + ' !important;'}).append(
          $('<div>', {class: 'box-header with-border'}).append(
            $('<i>',{class : 'fa fa-line-chart'}),
              $('<h3>', {class: 'box-title'}).append('Indicadores'),
                $('<div>',{class: 'box-tools pull-right'}).append(
                  $('<span>',{class: 'date-indicator'})
                  )
                ),
              $('<div>', {class: 'box-body indicadores-content'}).append(
                widget.lista
                ),
              $('<div>', {class: 'box-footer'})
          )
        );
      $('.dof-content').html(widget.dom);
        var date = new Date();
        $('.date-indicator').html(date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear());
      }
    }
</script>
  <body>
    <!-- Contenedor del widget -->
<div class="dof-content"></div>
  </body>
</html>
