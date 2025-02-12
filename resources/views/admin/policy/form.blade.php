<div class="modal-body">
    <div class="row">
        <div class="col-12 mb-3">
            <label for="key" class="form-label">Policy Name:
                {{ $row->key ?? '' }}
            </label>
            <input type="hidden" name="key" class="form-control"
                value="{{ $row->key ?? '' }}" required>
            <span data-error="key" class="text-danger mt-2"></span>
        </div>
        <div class="col-12 mb-3">
            <label for="description">Description</label>
            <div style="height:150px;" id="editor">
                {!! $row->description ?? '' !!}
            </div>
            <input type="hidden" id="description" name="description" required></input>
            <span data-error="description" class="text-danger mt-2"></span>
        </div>
    </div>
</div>

<div class="modal-footer">
    <div class="row">
        <div class="col mb-3">
            <button class="btn btn-primary" type="submit">Submit</button>
            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
</div>
