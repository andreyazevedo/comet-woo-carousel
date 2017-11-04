<div class="comet-field">
  <div class="comet-label">
    <label for="">Source</label>
    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing</p>
  </div>
  <div class="comet-input">
    <select class="comet-select" name="source" data-minimum-results-for-search="Infinity">
      <option value="posts">Posts</option>
      <option value="pages">Páginas</option>
    </select>
  </div>
</div>

<div class="comet-field">
  <div class="comet-label">
    <label for="">Categorias de Produtos</label>
    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing</p>
  </div>
  <div class="comet-input">
    <select class="comet-select multi" name="categories[]" multiple="multiple">
      <option value="posts">Posts</option>
      <option value="pages">Páginas</option>
    </select>
  </div>
</div>

<div class="comet-field col-six">
  <div class="comet-label">
    <label for="">Ordenar Por</label>
    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing</p>
  </div>
  <div class="comet-input">
    <select class="comet-select" name="source" data-minimum-results-for-search="Infinity">
      <option value="posts">Data de Criação</option>
      <option value="pages">Título</option>
      <option value="pages">Aleatório</option>
    </select>
  </div>
</div>

<div class="comet-field col-six">
  <div class="comet-label">
    <label for="">Ordem</label>
    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing</p>
  </div>
  <div class="comet-input">
    <select class="comet-select" name="source" data-minimum-results-for-search="Infinity">
      <option value="posts">Ascendente</option>
      <option value="pages">Descendente</option>
    </select>
  </div>
</div>

<div style="clear:both"></div>

<script>
  jQuery(document).ready(function() {
    jQuery('.comet-select').select2();
  });
</script>
