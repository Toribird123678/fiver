<?php require_once 'classloader.php'; ?>
<?php 
if (!$userObj->isLoggedIn()) {
  header("Location: login.php");
}
// Allow clients and admins; redirect freelancers
if (isset($_SESSION['role']) && $_SESSION['role'] === 'freelancer') {
  header("Location: ../freelancer/index.php");
}
?>
<!doctype html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <title>All Projects</title>
  </head>
  <body>
    <?php include 'includes/navbar.php'; ?>
    <div class="container-fluid">
      <div class="row mt-3">
        <div class="col-12">
          <h2>All Freelancer Proposals</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php $getProposals = $proposalObj->getProposals(); ?>
          <?php foreach ($getProposals as $proposal) { ?>
          <div class="card shadow mt-3">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <h5><a href="other_profile_view.php?user_id=<?php echo $proposal['user_id'] ?>"><?php echo $proposal['username']; ?></a></h5>
                  <img src="<?php echo '../images/'.$proposal['image']; ?>" class="img-fluid" alt="">
                  <p class="mt-2 mb-2"><?php echo $proposal['description']; ?></p>
                  <p class="mb-1"><strong><?php echo number_format($proposal['min_price']) . " - " . number_format($proposal['max_price']);?> PHP</strong></p>
                  <?php if (!empty($proposal['category_name'])) { ?>
                    <span class="badge badge-info">Category: <?php echo $proposal['category_name']; ?></span>
                  <?php } ?>
                  <?php if (!empty($proposal['subcategory_name'])) { ?>
                    <span class="badge badge-secondary">Subcategory: <?php echo $proposal['subcategory_name']; ?></span>
                  <?php } ?>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-header"><strong>Submit Offer</strong></div>
                    <div class="card-body">
                      <?php 
                        $hasSubmittedOffer = $offerObj->hasClientSubmittedOffer($_SESSION['user_id'], $proposal['proposal_id']);
                        if ($hasSubmittedOffer) {
                      ?>
                        <div class="alert alert-warning text-center mb-0">
                          <strong>You have already submitted an offer to this proposal!</strong>
                        </div>
                      <?php } else { ?>
                        <form action="core/handleForms.php" method="POST">
                          <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" name="description" required>
                            <input type="hidden" name="proposal_id" value="<?php echo $proposal['proposal_id']; ?>">
                            <input type="submit" class="btn btn-primary mt-2" name="insertOfferBtn" value="Submit Offer">
                          </div>
                        </form>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </body>
  </html>


