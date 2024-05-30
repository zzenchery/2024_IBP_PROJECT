<fieldset>
    <div class="form-group">
        <label for="director">Director *</label>
        <input type="text" name="director" value="<?php echo htmlspecialchars($edit ? $serie['director'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Director" class="form-control"
               required="required" id="author">
    </div>
    <div class="form-group">
        <label for="name">Name *</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($edit ? $serie['name'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Serie Name" class="form-control"
               required="required" id="name">
    </div>
    <div class="form-group">
        <label for="type">Type *</label>
        <input type="text" name="type" value="<?php echo htmlspecialchars($edit ? $serie['type'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Serie Type" class="form-control"
               required="required" id="type">
    </div>
    <div class="form-group">
        <label for="comment">Comment</label>
        <textarea name="comment" placeholder="Comment" class="form-control"
                  id="comment"><?php echo htmlspecialchars(($edit) ? $serie['comment'] : '', ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div>
    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning">Save <span class="glyphicon glyphicon-send"></span></button>
    </div>
</fieldset>