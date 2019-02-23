<section id="about" class="wow">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 text-center">
        <?php $this->load->view('/admin/nav'); ?>

      </div>

      <div class="col-lg-8 content">
        <h2>Aktivitas User</h2>

        <div class="text-primary">
          <input type="radio" id="userstat" name="userstat" value="0" checked> Alumni <br>
          <input type="radio" id="userstat" name="userstat" value="1"> Contact Person Mitra <br>
        </div>
        <br>

        <table id="useractivity" class="table small" width="100%">
          <thead>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Last Login</th>
            <th>Visits</th>
          </thead>
        </table>

      </div>

    </div>

  </div>
</section><!-- #about -->

<script type="text/javascript">

$(function(){
  refreshTable();
});

$("input[name='userstat']").change(function(){
  refreshTable( $("input[name='userstat']:checked").val() );
})

function refreshTable( stat = 0 ){
  $("#useractivity").DataTable({
    ajax: { url  : "/api_admin/useractivity/stat/" + stat,
            type : "GET"
          },
    sAjaxDataProp: "users",
    columns: [  {data: 'id'},
                {data: 'nama'},
                {data: 'email'},
                {data: 'last_login'},
                {data: 'visits', "className": "dt-center"},
              ],
    order: [[3, 'desc']],
    destroy: true
  });
}
</script>
