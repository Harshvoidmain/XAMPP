<div class="col-md-3">
    <ul class="nav nav-pills nav-stacked">
            <?php foreach($lists as $list) { 
                $id = $list['OrganizingCommittee']['id'];
                $url = '/people/organizing_committee/' . $id;
                $value = $list['OrganizingCommittee']['name'];?>
            
                <li>
                    <?php echo $this->Html->link($value, '/' . $url); ?>
                </li>
            
            <?php } ?>
        </ul>
</div>