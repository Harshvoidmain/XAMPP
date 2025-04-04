<?php
echo $this->Html->script('/tiny_mce/tiny_mce');
echo $this->Html->css(array('/jquery-tags-input/jquery.tagsinput'));
echo $this->Html->script(array('/jquery-tags-input/jquery.tagsinput.min'));
?>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box blue ">
            <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i> <?php echo __('Admin Edit Latest News'); ?></div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <?php echo $this->Form->create('LatestNews', array('class' => 'form-horizontal form-bordered form-label-stripped', 'type' => 'file')); ?>
                <?php
                echo $this->Form->input('id');
                echo $this->Form->input('topic');
                echo $this->Form->input('description');
                echo $this->Form->input('attachment', array('value' => 0, 'unchecked'));
                echo $this->Form->input('design');
                echo $this->Form->input('file');
                echo $this->Form->input('is_active');
                echo $this->Form->input('active_till');
                ?>
                <?php echo $this->Form->end(__('Submit')); ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    tinyMCE.init({
        // General options
        mode: "textareas",
        theme: "advanced",
        plugins: "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
        // Theme options
        theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3: "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4: "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
        theme_advanced_toolbar_location: "top",
        theme_advanced_toolbar_align: "left",
        theme_advanced_statusbar_location: "bottom",
        theme_advanced_resizing: true,
        template_replace_values: {
            username: "Some User",
            staffid: "991234"
        }
    });
</script>