
<form action="" method="post">

<div class="row">

    <div class="col-4">
        <label class="form-label" for=""> Select Year</label>
    <select class="form-control" name="year" id="">
    <option value="">SELECT YEAR</option>
    <?php echo getYear(); ?>
</select>
    </div>
    <div class="col-4">
        <label class="form-label" for="">Select Class</label>
    <select class="form-control" name="class" id="">
    <option value="">SELECT Class</option>
    <?php echo getClass(); ?>
</select>
</div>
<div class="col-4">
    <label class="form-label" for="">Select Section</label>
<select name="section" id="" class="form-control">
    <option value="">SELECT Section</option>
    <?php echo getSection(); ?>
</select>
</div>

<div class="col-4">

</div>

</div>
<input type="submit" value="Continue" class="btn btn-primary" name="attendance_continue">
</form>
