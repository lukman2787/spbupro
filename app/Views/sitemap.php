<form action="<?= base_url('sitemap/create_sitemap') ?>" method="post" target="_blank" rel="noopener" rel="noreferrer">
	<?= csrf_field() ?>
	<div class="form-group col-md-5" style="margin-left:-15px;">
        <div class="input-group">
            <div class="input-group-addon" style="padding:5px 15px;">Change Frequency</div>
            <select class="form-control input-sm" name="changefreq">
                <option value="" selected>None</option>
                <option value="always">Always</option>
                <option value="hourly">Hourly</option>
                <option value="daily">Daily</option>
                <option value="weekly">Weekly</option>
                <option value="monthly">Monthly</option>
                <option value="yearly">Yearly</option>
                <option value="never">Never</option>
            </select>
        </div>
    </div>
    <div class="form-group col-md-3" style="margin-left:-15px;">
        <div class="input-group">
            <div class="input-group-addon" style="padding:5px 15px;">Priority</div>
            <select class="form-control input-sm" name="priority">
                <option value="0.1" selected>0.1</option>
                <option value="0.2">0.2</option>
                <option value="0.3">0.3</option>
                <option value="0.4">0.4</option>
                <option value="0.5">0.5</option>
                <option value="0.6">0.6</option>
                <option value="0.7">0.7</option>
                <option value="0.8">0.8</option>
                <option value="0.9">0.9</option>
                <option value="1.0">1.0</option>
            </select>
        </div>
    </div>
    <div class="form-group col-md-4" style="margin-left:-15px;">
        <button class="btn btn-sm bg-green btn-flat" type="submit">Buat Sitemap</button>
    </div>
</form>