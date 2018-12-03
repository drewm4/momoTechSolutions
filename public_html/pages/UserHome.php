<?php
    require "../header.php";
?>

<main>

<div class="container mt-3">
    <br>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#UserHome">All Notifications</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#MyEvents">MyEvents</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#UserPref">User Preferences</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#Upcoming">All Events</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">

        
<!--NOTIFICATIONS -->

        <div id="UserHome" class="container tab-pane active"><br>
            <h2>All Notifications</h2>
            
            <?php
            require '../src/mysql.php';

            $sql = "SELECT * FROM notify";
            //if we prefer to only show notifications specific to this user, SELECT * FROM event INNER JOIN user_eventpref ON event.event_id=user_eventpref.event_id
            $result = mysqli_query($conn, $sql) or die("SQL Error: ".mysqli_error($conn));

            while($record = mysqli_fetch_assoc($result)){
            ?>
            
            <hr>
            <div class="card-deck">
                <div class="card bg-primary">
                    <div class="card-body text-center">
                        <p class="card-text">Event Name:     <?php echo $record['notify_name']; ?></p><br>
                        <p class="card-text">Event ID:       <?php echo $record['notify_id']; ?></p>
                        <p class="card-text">Event Date:     <?php echo $record['notify_date']; ?></p>
                        <p class="card-text">Event Type:     <?php echo $record['notify_expdate']; ?></p>
                        <p class="card-text">Event Info:     <?php echo $record['notify_body']; ?></p>
                    </div>
                </div>
                <!--<div class="card bg-success">-->
                <!--    <div class="card-body text-center">-->
                <!--        <p class="card-text">Some text inside the third card</p>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="card bg-success">-->
                <!--    <div class="card-body text-center">-->
                <!--        <p class="card-text">Some text inside the third card</p>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="card bg-success">-->
                <!--    <div class="card-body text-center">-->
                <!--        <p class="card-text">Some text inside the third card</p>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
            <?php } ?>
        </div>
        
<!--MY EVENTS -->

        <div id="MyEvents" class="container tab-pane fade"><br>
        
        
            <h2>My Events</h2>
            
            <?php
            require '../src/mysql.php';

            $sql = "SELECT * FROM event INNER JOIN user_eventpref ON event.event_id=user_eventpref.event_id";
            $result = mysqli_query($conn, $sql) or die("SQL Error: ".mysqli_error($conn));

            while($record = mysqli_fetch_assoc($result)){
            ?>
            
            <hr>
            <div class="card-deck">
                <div class="card bg-primary">
                    <div class="card-body text-center">
                        <p class="card-text">Event Name:     <?php echo $record['event_name']; ?></p><br>
                        <p class="card-text">Event ID:       <?php echo $record['event_id']; ?></p>
                        <p class="card-text">Event Date:     <?php echo $record['event_date']; ?></p>
                        <p class="card-text">Event Type:     <?php echo $record['event_type']; ?></p>
                        <p class="card-text">Event Info:     <?php echo $record['event_info']; ?></p>
                    </div>
                </div>
                <!--<div class="card bg-success">-->
                <!--    <div class="card-body text-center">-->
                <!--        <p class="card-text">Some text inside the third card</p>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="card bg-success">-->
                <!--    <div class="card-body text-center">-->
                <!--        <p class="card-text">Some text inside the third card</p>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="card bg-success">-->
                <!--    <div class="card-body text-center">-->
                <!--        <p class="card-text">Some text inside the third card</p>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
            <?php } ?>
        </div>
        
        <!--USER PREFERENCES-->
        
        
        <div id="UserPref" class="container tab-pane fade"><br>
            <h2>Preferences</h2>
            <hr>
            <p></p>
            <p></p>
            <div class="row">
                <div class="col-sm-10 text-left">
                    <div class="container">
                        <div class="media">
                            <img src="img" class="align-self-start mr-3" style="width:60px">
                            <div class="media-body">
                                <h4>User Information</h4>
                                <p>user@email.com</p>
                                <p>password1</p>
                                <p></p>
                            </div>

                        </div>
                        <div class="container">
                            <p></p>
                            <h3>Notification Preferences</h3>
                            <p></p>
                            <p></p>

                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Notification Type</th>
                                    <th>Would you like to receive these notifications?</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!--<tr>-->
                                <!--    <td>Browser</td>-->
                                <!--    <td>-->
                                <!--        <div class="btn-group">-->
                                <!--            <button type="button" class="btn btn-outline-success">Yes</button>-->
                                <!--            <button type="button" class="btn btn-outline-danger">No</button>-->
                                <!--        </div>-->
                                <!--    </td>-->
                                <!--</tr>-->
                                <tr>
                                    <td>Email</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline-success">Yes</button>
                                            <button type="button" class="btn btn-outline-danger">No</button>
                                        </div>
                                    </td>
                                </tr>

                            </table>
                        </div>
                        <div class="container">
                            <p></p>

                            <h3>Select Events</h3>
                            
                            <?php
                                require '../src/mysql.php';

                                $sql = "SELECT * FROM event WHERE event_id NOT IN (SELECT event_id FROM user_eventpref)";
                                $result = mysqli_query($conn, $sql) or die("SQL Error: ".mysqli_error($conn));
                    
                                while($record = mysqli_fetch_assoc($result)){
                            ?>
                            
                            
                            <p></p>
                            <p></p>
                            
                            <form action="../includes/update_user_events.php" method="post">
                            
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Event Name</th>
                                    <th>Event Date</th>
                                    <th>Event Expiration Date</th>
                                    <th>Add to My Events</th>
                                    
                                </tr>
                                
                                </thead>
                                
                                <tbody>
                                <tr>
                                    
                                    
                                    <td type="input" name="eventname"><?php echo $record['event_name'];?></td>
                                    <input type="text" name="eventid" value="<?php echo $record['event_id'];?>" hidden>
                                    <td type="input" name="eventdate"><?php echo $record['event_date'];?></td>
                                    <td type="input" name="eventexpire"><?php echo $record['event_expdate'];?></td>
                                    <td><button type="submit" name="addevent" class="btn btn-default">Add Event</button></td>
                                    </form>
                                    
                                    <?php } ?>
                                </tr>
                            </table>
                                    
                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="Upcoming" class="container tab-pane fade"><br>
            <h2>All Current Events</h2>
            
            <?php
            require '../src/mysql.php';

            $sql = "SELECT * FROM event";
            $result = mysqli_query($conn, $sql) or die("SQL Error: ".mysqli_error($conn));

            while($record = mysqli_fetch_assoc($result)){
            ?>
            
            <p></p>
            <p></p>
            <div class="card-deck">
                <div class="card bg-primary">
                    <div class="card-body text-center">
                        <p class="card-text">Event Name:     <?php echo $record['event_name']; ?></p><br>
                        <p class="card-text">Event ID:       <?php echo $record['event_id']; ?></p>
                        <p class="card-text">Event Date:     <?php echo $record['event_date']; ?></p>
                        <p class="card-text">Event Type:     <?php echo $record['event_type']; ?></p>
                        <p class="card-text">Event Info:     <?php echo $record['event_info']; ?></p>
                    </div>
                </div>
                <!--<div class="card bg-success">-->
                <!--    <div class="card-body text-center">-->
                <!--        <p class="card-text">Some text inside the third card</p>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="card bg-success">-->
                <!--    <div class="card-body text-center">-->
                <!--        <p class="card-text">Some text inside the third card</p>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="card bg-success">-->
                <!--    <div class="card-body text-center">-->
                <!--        <p class="card-text">Some text inside the third card</p>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
            <?php } ?>
        </div>
            <p></p>
        </div>
    </div>
</div>

</body>
</html>
</main>

<?php
    require "../footer.php";
?>