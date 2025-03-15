 <ul class="nav nav-tabs nav-stacked span3">
    <li class="nav-header">In this section</li>
    <li class="">
<?php echo $this->Html->link('Dashboard', '/dashboard/'); ?>
    </li>
    <li class="">
<?php echo $this->Html->link('My Enquiries', '/enquiries/my_enquiries/' . $type = 'flight'); ?>
    </li>
    <li class="">
<?php echo $this->Html->link('My Bookings', '/enquiries/my_bookings/' . $type = 'flight'); ?>
    </li>
    <li class="">
<?php echo $this->Html->link('My Profile', '/users/user_profile'); ?>
    </li>
</ul>