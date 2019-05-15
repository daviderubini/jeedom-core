<?php
if (!isConnect('admin')) {
  throw new Exception('{{401 - Accès non autorisé}}');
}
$count = array('history' => 0, 'timeline' => 0);
<<<<<<< HEAD
$list_cmd = array();
foreach (cmd::all() as $cmd) {
  $info_cmd = utils::o2a($cmd);
  $info_cmd['humanName'] = $cmd->getHumanName(true);
  $eqLogic = $cmd->getEqLogic();
  $info_cmd['plugins'] = $eqLogic->getEqType_name();
  $list_cmd[] = $info_cmd;
=======
$cmds = cmd::all();
foreach ($cmds as $cmd) {
>>>>>>> 370b7e805d7368b83ea9dce02286fd4ec4f466d7
  if ($cmd->getIsHistorized() == 1) {
    $count['history']++;
  }
  if ($cmd->getConfiguration('timeline::enable') == 1) {
    $count['timeline']++;
  }
}
?>
<div style="display: none;" id="md_cmdConfigureHistory"></div>
<<<<<<< HEAD
<a class="btn btn-success btn-sm pull-right" id="bt_cmdConfigureCmdHistoryApply" style="color : white;" ><i class="fas fa-check"></i> {{Valider}}</a>
<center><span class="label label-info" style="font-size: 1em;">{{Commande(s) historisée(s) : }}<?php echo $count['history'] ?> - {{Commande(s) timeline : }}<?php echo $count['timeline'] ?></span></center>

<br/>
<table class="table table-bordered table-condensed tablesorter" id="table_cmdConfigureHistory" style="width:100%">
  <thead>
    <tr>
      <th data-filter="false" data-sorter="checkbox">{{Historisé}}</th>
      <th data-filter="false" data-sorter="checkbox">{{Timeline}} <a class="btn btn-danger btn-xs pull-right" id="bt_canceltimeline" style="color : white;" ><i class="fas fa-times"></i></a><a class="btn btn-success btn-xs pull-right" id="bt_applytimeline" style="color : white;" ><i class="fas fa-check"></i></a></th>
=======
<a class="btn btn-success btn-sm pull-right" id="bt_cmdConfigureCmdHistoryApply"><i class="fas fa-check"></i> {{Valider}}</a>
<center>
  <span class="label label-info">{{Commande(s) historisée(s) : }}<?php echo $count['history'] ?> - {{Commande(s) timeline : }}<?php echo $count['timeline'] ?></span>
</center>

<br/>
<table class="table table-bordered table-condensed tablesorter" id="table_cmdConfigureHistory">
  <thead>
    <tr>
      <th data-filter="false" data-sorter="checkbox">{{Historisé}}</th>
      <th data-filter="false" data-sorter="checkbox">{{Timeline}}
        <a class="btn btn-success btn-xs" id="bt_applytimeline" style="width:22px;"><i class="fas fa-check"></i></a>
        <a class="btn btn-danger btn-xs" id="bt_canceltimeline" style="width:22px;"><i class="fas fa-times"></i></a>
      </th>
>>>>>>> 370b7e805d7368b83ea9dce02286fd4ec4f466d7
      <th>{{Type}}</th>
      <th>{{Nom}}</th>
      <th>{{Plugin}}</th>
      <th data-sorter="select-text">{{Mode de lissage}}</th>
      <th data-sorter="select-text">{{Purge de l'historique si plus vieux}}</th>
      <th data-sorter="false" data-filter="false">{{Action}}</th>
    </tr>
  </thead>
  <tbody>
<<<<<<< HEAD
=======
    <?php
    foreach ($cmds as $cmd) {
      echo '<tr data-cmd_id="'.$cmd->getId(). '">';
      echo '<td style="width:85px;">';
      if($cmd->getType() == 'info'){
        echo '<center><input type="checkbox" class="cmdAttr" data-l1key="isHistorized" '.(($cmd->getIsHistorized() == 1) ? 'checked' : '').' /></center>';
      }
      echo '</td>';
      echo '<td style="width:135px;">';
      echo '<center><input type="checkbox" class="cmdAttr" data-l1key="configuration" data-l2key="timeline::enable" '.(($cmd->getConfiguration('timeline::enable') == 1) ? 'checked' : '').' /></center>';
      echo '</td>';
      echo '<td style="width:130px;">';
      echo '<span class="cmdAttr">'.$cmd->getType().' / '.$cmd->getSubType().'</span>';
      echo '</td>';
      echo '<td>';
      echo '<span class="cmdAttr" data-l1key="id" style="display:none;">'.$cmd->getId().'</span>';
      echo '<span class="cmdAttr" data-l1key="humanName">'.$cmd->getHumanName().'</span>';
      echo '</td>';
      echo '<td style="width:100px;">';
      echo '<span class="cmdAttr" data-l1key="plugins">'.$cmd->getEqLogic()->getEqType_name().'</span>';
      echo '</td>';
      echo '<td>';
      if($cmd->getType() == 'info' && $cmd->getSubType() == 'numeric'){
        echo '<div class="form-group">';
        echo '<select class="form-control cmdAttr input-sm" data-l1key="configuration" data-l2key="historizeMode">';
        echo '<option value="avg" '.(($cmd->getConfiguration('historizeMode') == 'avg') ? 'selected' : '').'>{{Moyenne}}</option>';
        echo '<option value="min" '.(($cmd->getConfiguration('historizeMode') == 'min') ? 'selected' : '').'>{{Minimum}}</option>';
        echo '<option value="max" '.(($cmd->getConfiguration('historizeMode') == 'max') ? 'selected' : '').'>{{Maximum}}</option>';
        echo '<option value="none" '.(($cmd->getConfiguration('historizeMode') == 'none') ? 'selected' : '').'>{{Aucun}}</option>';
        echo '</select>';
      }
      echo '</td>';
      echo '<td>';
      if($cmd->getType() == 'info'){
        echo '<select class="form-control cmdAttr input-sm" data-l1key="configuration" data-l2key="historyPurge">';
        echo '<option value="" '.(($cmd->getConfiguration('historyPurge') == '') ? 'selected' : '').'>{{Jamais}}</option>';
        echo '<option value="-1 day" '.(($cmd->getConfiguration('historyPurge') == '-1 day') ? 'selected' : '').'>{{1 jour}}</option>';
        echo '<option value="-7 days" '.(($cmd->getConfiguration('historyPurge') == '-7 days') ? 'selected' : '').'>{{7 jours}}</option>';
        echo '<option value="-1 month" '.(($cmd->getConfiguration('historyPurge') == '-1 month') ? 'selected' : '').'>{{1 mois}}</option>';
        echo '<option value="-3 month" '.(($cmd->getConfiguration('historyPurge') == '-3 month') ? 'selected' : '').'>{{3 mois}}</option>';
        echo '<option value="-6 month" '.(($cmd->getConfiguration('historyPurge') == '-6 month') ? 'selected' : '').'>{{6 mois}}</option>';
        echo '<option value="-1 year" '.(($cmd->getConfiguration('historyPurge') == '-1 year') ? 'selected' : '').'>{{1 an}}</option>';
        echo '</select>';
      }
      echo '</td>';
      echo '<td style="width:90px;">';
      if($cmd->getType() == 'info'){
        echo '<a class="btn btn-default btn-sm pull-right cursor bt_configureHistoryExportData" data-id="' .$cmd->getId(). '" title="{{Exporter la commande}}"><i class="fas fa-share export"></i></a>';
      }
      echo '<a class="btn btn-default btn-sm pull-right cursor bt_configureHistoryAdvanceCmdConfiguration" data-id="'  .$cmd->getId(). '" title="{{Configuration de la commande}}"><i class="fas fa-cogs"></i></a>';
      echo '</td>';
      echo '</tr>';
    }
    ?>
>>>>>>> 370b7e805d7368b83ea9dce02286fd4ec4f466d7
  </tbody>
</table>

<script>
initTableSorter();
$("#table_cmdConfigureHistory").tablesorter({headers:{0:{sorter:'checkbox'}}});
<<<<<<< HEAD
table_history = [];
for (var i in cmds_history_configure) {
  table_history.push(addCommandHistory(cmds_history_configure[i]));
}
$('#table_cmdConfigureHistory tbody').empty().append(table_history);
=======
>>>>>>> 370b7e805d7368b83ea9dce02286fd4ec4f466d7
$('#table_cmdConfigureHistory tbody tr').attr('data-change','0');
$("#table_cmdConfigureHistory").trigger("update");
$("#table_cmdConfigureHistory").width('100%');

<<<<<<< HEAD
function addCommandHistory(_cmd){
  var tr = '<tr data-cmd_id="' +_cmd.id+ '">';
  tr += '<td>';
  if(_cmd.type == 'info'){
    tr += '<input type="checkbox" class="cmdAttr" data-l1key="isHistorized" />';
  }
  tr += '</td>';
  tr += '<td style="width:160px;">';
  tr += '<input type="checkbox" class="cmdAttr" data-l1key="configuration" data-l2key="timeline::enable" />';
  tr += '</td>';
  tr += '<td>';
  tr += '<span class="cmdAttr">'+_cmd.type+' / '+_cmd.subType+'</span>';
  tr += '</td>';
  tr += '<td>';
  tr += '<span class="cmdAttr" data-l1key="id" style="display:none;"></span>';
  tr += '<span class="cmdAttr" data-l1key="humanName"></span>';
  tr += '</td>';
  tr += '<td>';
  tr += '<span class="cmdAttr" data-l1key="plugins"></span>';
  tr += '</td>';
  tr += '<td>';
  if(_cmd.type == 'info' && _cmd.subType == 'numeric'){
    tr += '<div class="form-group">';
    tr += '<select class="form-control cmdAttr input-sm" data-l1key="configuration" data-l2key="historizeMode">';
    tr += '<option value="avg">{{Moyenne}}</option>';
    tr += '<option value="min">{{Minimum}}</option>';
    tr += '<option value="max">{{Maximum}}</option>';
    tr += '<option value="none">{{Aucun}}</option>';
    tr += '</select>';
  }
  tr += '</td>';
  tr += '<td>';
  if(_cmd.type == 'info'){
    tr += '<select class="form-control cmdAttr input-sm" data-l1key="configuration" data-l2key="historyPurge">';
    tr += '<option value="">{{Jamais}}</option>';
    tr += '<option value="-1 day">{{1 jour}}</option>';
    tr += '<option value="-7 days">{{7 jours}}</option>';
    tr += '<option value="-1 month">{{1 mois}}</option>';
    tr += '<option value="-3 month">{{3 mois}}</option>';
    tr += '<option value="-6 month">{{6 mois}}</option>';
    tr += '<option value="-1 year">{{1 an}}</option>';
    tr += '</select>';
  }
  tr += '</td>';
  tr += '<td>';
  if(_cmd.type == 'info'){
    tr += '<a class="btn btn-default btn-sm pull-right cursor bt_configureHistoryExportData" data-id="'  +_cmd.id+ '"><i class="fas fa-share export"></i></a>';
  }
  tr += '<a class="btn btn-default btn-sm pull-right cursor bt_configureHistoryAdvanceCmdConfiguration" data-id="'  +_cmd.id+ '"><i class="fas fa-cogs"></i></a>';
  tr += '</td>';
  tr += '</tr>';
  var result = $(tr);
  result.setValues(_cmd, '.cmdAttr');
  return result;
}


=======
>>>>>>> 370b7e805d7368b83ea9dce02286fd4ec4f466d7
$('.bt_configureHistoryAdvanceCmdConfiguration').off('click').on('click', function () {
  $('#md_modal2').dialog({title: "{{Configuration de la commande}}"});
  $('#md_modal2').load('index.php?v=d&modal=cmd.configure&cmd_id=' + $(this).attr('data-id')).dialog('open');
});

$(".bt_configureHistoryExportData").on('click', function () {
  window.open('core/php/export.php?type=cmdHistory&id=' + $(this).attr('data-id'), "_blank", null);
});

$('.cmdAttr').on('change click',function(){
  $(this).closest('tr').attr('data-change','1');
});

$('#bt_cmdConfigureCmdHistoryApply').on('click',function(){
  var cmds = [];
  $('#table_cmdConfigureHistory tbody tr').each(function(){
    if($(this).attr('data-change') == '1'){
      cmds.push($(this).getValues('.cmdAttr')[0]);
    }
  })
  jeedom.cmd.multiSave({
    cmds : cmds,
    error: function (error) {
      $('#md_cmdConfigureHistory').showAlert({message: error.message, level: 'danger'});
    },
    success: function (data) {
      $("#table_cmdConfigureHistory").trigger("update");
      $('#md_cmdConfigureHistory').showAlert({message: '{{Modifications sauvegardées avec succès}}', level: 'success'});
    }
  });
});

$('#bt_canceltimeline').on('click',function(){
  $('.cmdAttr[data-l1key=configuration][data-l2key="timeline::enable"]:visible').each(function(){
    $(this).prop('checked', false);
    $(this).closest('tr').attr('data-change','1');
  });
});

$('#bt_applytimeline').on('click',function(){
  $('.cmdAttr[data-l1key=configuration][data-l2key="timeline::enable"]:visible').each(function(){
    $(this).prop('checked', true);
    $(this).closest('tr').attr('data-change','1');
  });
});

</script>
