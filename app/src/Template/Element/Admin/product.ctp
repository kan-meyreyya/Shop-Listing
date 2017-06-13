
<style>
    .file-wrap input[type="file"] {
        display: none;
    }
    .file-wrap {
        width: 150px;
        height: 150px;
        position: relative;
    }
    .file-wrap:hover {
        cursor: pointer;
    }
    .file-wrap p {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateX(-50%) translateY(-50%);
    }
    .file-wrap span {
        display: block;
        text-align: center;
        color: #d0caca;
    }
    .file-wrap span > i {
        font-size: 20px;
    }
    .file-wrap img {
        width: 100%;
        object-fit: cover;
        height: inherit;
    }
</style>

<?php
    $templates = array(
        'inputContainer' => '{{content}}',
        'inputContainerError' => '<div class="has-error">{{content}}<label class="control-label" for="inputError">{{error}}</label></div>',
    );
?>
<section class="content-header">
    <h1><?php echo ($this->request->action === 'add') ? 'Add New Product' : 'Edit Product'; ?></h1>
    <ol class="breadcrumb">
        <li>
            <?php
                echo $this->Html->link(
                    '<i class="fa fa-dashboard"></i> Home', array(
                        'controller' => 'homes',
                        'action' => 'index',
                    ), array(
                        'escape' => false,
                    )
                );
            ?>
        </li>
        <li>Product</li>
        <li class="active"><?php echo ($this->request->action === 'add') ? 'Create' : 'Edit'; ?></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <?php echo $this->Flash->render(); ?>
            <div class="box box-primary">
                <?php
                    echo $this->Form->create(isset($product) ? $product : '', array(
                        'role' => 'form',
                        'autocomplete' => 'off',
                        'type' => 'file',
                    ));
                ?>
                <div class="box-body">
                    <div class="form-group">
                        <label>Product Name</label>
                        <?php
                            echo $this->Form->input('name', array(
                                'placeholder' => 'Product Name',
                                'class' => 'form-control',
                                'label' => false,
                                'templates' => $templates,
                            ));
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <?php
                            echo $this->Form->input('description', array(
                                'placeholder' => 'Product Description',
                                'type' => 'textarea',
                                'class' => 'form-control',
                                'label' => false,
                                'templates' => $templates,
                            ));
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                         <?php
                            echo $this->Form->input('price', array(
                                'placeholder' => 'Price',
                                'type' => 'number',
                                'class' => 'form-control',
                                'label' => false,
                                'templates' => $templates,
                            ));
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                         <?php
                            echo $this->Form->input('category_id', array(
                                'type' => 'select',
                                'class' => 'form-control',
                                'label' => false,
                                'templates' => $templates,
                                'options' => $categories,
                            ));
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Thumbnail</label>
                        <div class="file-wrap has-error">
                            <?php
                                $url = $product->thumbnail ? $this->Url->image('uploads/products/' . $product->thumbnail) : '';
                            ?>
                            <img src="<?php echo $url; ?>" id="p_thumbnail"/>
                            <?php
                                echo $this->Form->input('thumbnail', array(
                                    'type' => 'file',
                                    'label' => false,
                                    'templates' => array(
                                        'inputContainer' => '{{content}}',
                                        'inputContainerError' => '{{content}}<label class="control-label" for="inputError">{{error}}</label>'
                                    )
                                ));
                            ?>
                            <?php if (!$url) : ?>
                            <p>
                                <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                                <span>&ensp; Add Image</span>
                            </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="box-footer">
                    <?php
                        echo $this->Form->submit('Save', array(
                            'class' => 'btn btn-primary',
                        ));
                    ?>
                </div>
            <?php echo $this->Form->end(); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Slide Demo</h3>
                </div>
                <div class="box-body">
                    <?php
                        echo $this->Form->create('', array(
                            'url' => array(
                                'action' => 'add_slide',
                            ),
                            'type' => 'file',
                            'class' => 'dropzone',
                            'id' => 'my-awesome-dropzone',
                        ));
                    ?>
                    <div class="fallback">
                        <input type="file" name="file" multiple/>
                    </div>
                    <?php echo $this->Form->end(); ?>
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item">
                                <img src="http://placehold.it/900x500/39CCCC/ffffff&amp;text=I+Love+Bootstrap" alt="First slide">
                                <div class="carousel-caption">First Slide</div>
                            </div>

                            <div class="item">
                                <img src="http://placehold.it/900x500/3c8dbc/ffffff&amp;text=I+Love+Bootstrap" alt="Second slide">
                                <div class="carousel-caption">Second Slide</div>
                            </div>

                            <div class="item active">
                                <img src="http://placehold.it/900x500/f39c12/ffffff&amp;text=I+Love+Bootstrap" alt="Third slide">
                                <div class="carousel-caption">Third Slide</div>
                            </div>
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="fa fa-angle-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="fa fa-angle-right"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(function(e) {
        Dropzone.options.myAwesomeDropzone = {
            paramName: 'file',
            maxFilesize: 2,
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                }
                else { done(); }
            }
        };

        $('body').on('click', '.file-wrap', function(e) {
            $(this).find('#thumbnail').click();
        });

        $('body').on('click', '.file-wrap input', function(e) {
            e.stopPropagation();
        });

        $('body').on('change', '.file-wrap input', function(e) {
            $(this).closest('.file-wrap').find('p').remove();
            var input = document.getElementById('thumbnail');
            var fReader = new FileReader();
            fReader.readAsDataURL(input.files[0]);
            fReader.onloadend = function(event){
                var img = document.getElementById('p_thumbnail');
                img.src = event.target.result;
            };
        });
    });
</script>