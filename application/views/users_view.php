<?php include_once 'header.php';
if($mode == 'view') { ?>
    <div class="mb-3">
        <a href="/index.php/users/add" class="btn btn-primary">Add new user</a>
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <?php if($this->session->userdata('level') == "2") { ?>
                <th scope="col">action</th>
            <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php if($users_data->num_rows() > 0) { $users = $users_data->result(); $counter = 1;
                foreach($users as $user) { ?>
                    <tr>
                        <th scope="row"><?php echo $counter++; ?></th>
                        <td><?php echo $user->name; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <?php if($this->session->userdata('level') == "2") { ?>
                            <td><a href="/index.php/users/edit/<?php echo $user->id; ?>">Edit</a></td>
                        <?php } ?>
                    </tr>
                <?php }
            } ?>
        </tbody>
    </table>
<?php } elseif($mode == 'edit') {
    if($users_data->num_rows() > 0) { $user = $users_data->result(); ?>
        <form method="post" action="/index.php/users/update/">
            <div class="form-group">
                <label for="exampleInputName1">Name</label>
                <input type="text" class="form-control" name="name" id="exampleInputName1" value="<?php echo $user[0]->name ?>">
            </div>  
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $user[0]->email ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputLevel1">Level</label>
                <select class="form-control" name="level" id="exampleInputLevel1">
                    <option value="1" <?php echo($user[0]->level == "1")? "selected" : ""; ?>>Owner</option>
                    <option value="2" <?php echo($user[0]->level == "2")? "selected" : ""; ?>>It</option>
                    <option value="3" <?php echo($user[0]->level == "3")? "selected" : ""; ?>>Operator</option>
                    <option value="4" <?php echo($user[0]->level == "4")? "selected" : ""; ?>>finance</option>
                </select>
            </div>       
            <input type="hidden" name="id" value="<?php echo $user[0]->id ?>">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    <?php }
} elseif($mode == 'add') { ?>
    <form method="post" action="/index.php/users/adding/">
        <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="text" class="form-control" name="name" id="exampleInputName1" />
        </div>  
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" />
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">password</label>
            <input type="password" class="form-control" name="password" id="exampleInPutpassword1" />
        </div>
        <div class="form-group">
            <label for="exampleInputPasswrod2">confirm password</label>
            <input type="password" class="form-control" name="password2" id="exampleInputPasswrod2" />
        </div>
        <div class="form-group">
            <label for="exampleInputLevel1">Level</label>
            <select class="form-control" name="level" id="exampleInputLevel1">
                <option value="1">Owner</option>
                <option value="2">It</option>
                <option value="3">Operator</option>
                <option value="4">finance</option>
            </select>
        </div>    
        <?php if($this->session->flashdata('msg')) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('msg');?>
            </div>   
        <?php } ?>        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
<?php } ?>

<?php include_once 'footer.php';