<div class="modal fade text-left" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="menuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="menuModalTitle">Tambah Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="menuForm" action="{{ route('menus.store') }}" method="POST" data-request="ajax" data-success-callback="{{ route('menus') }}">
                @csrf
                <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                    <div class="form-group">
                        <label for="name">Nama Menu <span class="text-danger"></span></label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nama Menu" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="link">Url: https:// <span class="text-danger">*</span></label>
                        <input type="text" name="link" id="link" class="form-control" placeholder="url" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="level">Atur Menu</label>
                        <select name="level" id="level" class="form-control" onchange="updateParentMenu()">
                            <option value="" selected>Pilih Atur Menu</option>
                            <option value="1">Menu Utama</option>
                            <option value="2">Sub Menu 1</option>
                            <option value="3">Sub Menu 2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="is_parent">Punya Menu?</label>
                        <select name="is_parent" id="is_parent" class="form-control">
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="parent">Sub Menu </label>
                        <select name="parent" id="parent" class="form-control">
                            <option value="" selected>Pilih Sub Menu</option>
                            <option value="0">None</option>
                            @foreach($menus as $menu)
                                @if($menu->is_parent)
                                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="order">Urutan <span class="text-danger">*</span></label>
                        <input type="number" name="order" id="order" class="form-control" placeholder="Urutan" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="link_target">Link Target</label>
                        <select name="link_target" id="link_target" class="form-control" onchange="updateExternalLink()">
                            <option value="none" selected>None</option>
                            <option value="_blank">_Blank</option>
                        </select>
                    </div>
                    <input type="hidden" name="is_external_link" id="is_external_link" value="0">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary waves-effect waves-light" type="submit"><i class="feather icon-send"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('_js')
    @parent
    <script>
        function updateParentMenu() {
            var level = document.getElementById("level").value;
            var parent = document.getElementById("parent");
            var noneOption = parent.querySelector('option[value="0"]');

            if (level == "1") {
                parent.value = "0";
                parent.setAttribute("readonly", true);
                // Disable other options in parent dropdown
                for (var i = 0; i < parent.options.length; i++) {
                    if (parent.options[i].value != "0") {
                        parent.options[i].style.display = "none";
                    }
                }
            } else {
                parent.removeAttribute("readonly");
                // Enable all options in parent dropdown
                for (var i = 0; i < parent.options.length; i++) {
                    parent.options[i].style.display = "block";
                }
                // Hide "None" option for Sub Menu levels
                if (level == "2" || level == "3") {
                    noneOption.style.display = "none";
                } else {
                    noneOption.style.display = "block";
                }
                parent.value = ""; // Reset value
            }
        }

        function updateExternalLink() {
            var linkTarget = document.getElementById("link_target").value;
            var isExternalLinkInput = document.getElementById("is_external_link");

            isExternalLinkInput.value = (linkTarget === "_blank") ? "1" : "0";
        }
    </script>
@endsection
