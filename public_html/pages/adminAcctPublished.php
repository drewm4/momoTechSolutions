<script>
    Notification.requestPermission();
</script>

<?php
    require "../header.php";
?>

<div class="container mt-3">
    <br>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#Published">Published</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#Unpublished">Unpublished</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#CreateNewEvent">Create New Event</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#CreateNewNotify">Create New Notification</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#Archived">Archived</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div id="Published" class="container tab-pane active"><br>
            <h2>Published Events</h2>
            <?php
            require '../src/mysql.php';

            $sql = "SELECT * FROM event";
            $result = mysqli_query($conn, $sql) or die("SQL Error: ".mysqli_error($conn));

            while($record = mysqli_fetch_assoc($result)){
            ?>
                <p></p>
                <p></p>
            <div class="card-deck">
                <div class="card bg-success">
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
            

        <div id="Unpublished" class="container tab-pane fade"><br>
            <h2>Unpublished Events</h2>
            <hr>
            <div class="card-deck">
                <div class="card bg-primary">
                    <div class="card-body text-center">
                        <p class="card-text">Some text inside the first card</p>
                        <p class="card-text">Some more text to increase the height</p>
                        <p class="card-text">Some more text to increase the height</p>
                        <p class="card-text">Some more text to increase the height</p>
                    </div>
                </div>
                <div class="card bg-success">
                    <div class="card-body text-center">
                        <p class="card-text">Some text inside the third card</p>
                    </div>
                </div>
                <div class="card bg-success">
                    <div class="card-body text-center">
                        <p class="card-text">Some text inside the third card</p>
                    </div>
                </div>
                <div class="card bg-success">
                    <div class="card-body text-center">
                        <p class="card-text">Some text inside the third card</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="CreateNewEvent" class="container tab-pane fade"><br>
            <h1>Create New Event</h1>
            <p></p>
            <div class="row">
                <div class="col-sm-8 text-left">
                    <form action="../includes/create_new_event.php" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Event Name</span>
                            </div>
                            <input type="text" name="eventname" class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Event Type</span>
                            </div>
                            <input type="text" name="eventtype" class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Event Date</span>
                            </div>
                            <input type="date" name="eventdate" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control-file border" name="file">
                        </div>
                        <p></p>
                        <div class="input-group mb-3">
                            <div class="container">
                                <form action="/action_page.php">
                                    <div class="form-group">
                                        <label for="comment">Additional Information:</label>
                                        <textarea class="form-control" rows="5" id="comment" name="text"></textarea>
                                    </div>
                                    <button type="submit" name="SaveEvent" class="btn btn-outline-dark">Save Event</button>
                                    <button type="submit" name="PublishEvent" class="btn btn-outline-dark">Publish Event</button>
                                </form>
                            </div>
                        </div>
                        <p></p>
                    </form>
                </div>
            </div>
        </div>
        <div id="CreateNewNotify" class="container tab-pane fade"><br>
            <h1>Create New Notification</h1>
            <p></p>
            <div class="row">
                <div class="col-sm-8 text-left">
                    <form action="../includes/create_new_event.php" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Notification Name</span>
                            </div>
                            <input type="text" name="Notification Name" class="form-control">
                        </div>
                        <div class="input-group mt-3 mb-3">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">
                                    Event Name
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Event 1</a>
                                    <a class="dropdown-item" href="#">Event 2</a>
                                    <a class="dropdown-item" href="#">Event 3</a>
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="Event Name">
                            <?php
                            require '../src/mysql.php';
                            $sql = "SELECT event_name FROM event";
                            $result = mysqli_query($conn, $sql) or die("Bad SQL: $sql");

                            echo "<select name='notifyevent' class='form-control'>";

                            while($row = mysqli_fetch_assoc($result)){
                            echo "<option value='{$row['event_name']}'>{$row['event_name']}</option>/n";
                            }
                            echo "</select>"
                            ?>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Notification Date</span>
                            </div>
                            <input type="date" name="eventdate" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control-file border" name="file">
                        </div>
                        <p></p>
                        <div class="input-group mb-3">
                            <div class="container">
                                <form action="/action_page.php">
                                    <div class="form-group">
                                        <label for="comment">Additional Information:</label>
                                        <textarea class="form-control" rows="5" id="comment" name="text"></textarea>
                                    </div>
                                    <button type="submit" name="SaveNotify" class="btn btn-outline-dark">Save Notification</button>
                                    <button type="submit" name="PushNotify" class="btn btn-outline-dark">Push Notification</button>
                                </form>
                            </div>
                        </div>
                        <p></p>
                    </form>
                </div>
            </div>
            <p></p>
        </div>
        <div id="Archived" class="container tab-pane fade"><br>
            <h2>Archived</h2>
            <p></p>
            <p></p>
            <div class="card-deck">
                <div class="card bg-primary">
                    <div class="card-body text-center">
                        <p class="card-text">Some text inside the first card</p>
                        <p class="card-text">Some more text to increase the height</p>
                        <p class="card-text">Some more text to increase the height</p>
                        <p class="card-text">Some more text to increase the height</p>
                    </div>
                </div>
                <div class="card bg-success">
                    <div class="card-body text-center">
                        <p class="card-text">Some text inside the third card</p>
                    </div>
                </div>
                <div class="card bg-success">
                    <div class="card-body text-center">
                        <p class="card-text">Some text inside the third card</p>
                    </div>
                </div>
                <div class="card bg-success">
                    <div class="card-body text-center">
                        <p class="card-text">Some text inside the third card</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>