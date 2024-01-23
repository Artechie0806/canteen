<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                    <?php if(isset($_SESSION['auth'])){
                        if($_SESSION['role_as'] != 1)
                        { ?>
                            <h2>Worker</h2>
                            <?php
                        }
                        else
                        { ?>
                            <h2>Hello Admin</h2>
                            <?php
                        }
                    } ?>
                </div>
            </div>

        </div>
    </div>
</nav>