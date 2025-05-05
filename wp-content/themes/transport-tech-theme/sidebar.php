<aside id="secondary" class="widget-area">
    <div class="container">
        <?php if (is_active_sidebar('sidebar-1')) : ?>
            <div class="sidebar-widgets">
                <?php dynamic_sidebar('sidebar-1'); ?>
            </div>
        <?php else : ?>
            <div class="default-sidebar-content">
                <h3>Bienvenido a nuestra barra lateral</h3>
                <p>Aquí puedes agregar widgets desde el personalizador de WordPress.</p>
            </div>
        <?php endif; ?>
    </div>
</aside>