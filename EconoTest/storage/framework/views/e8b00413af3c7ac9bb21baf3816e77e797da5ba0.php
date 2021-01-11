

<?php $__env->startSection('contenido'); ?>
    <section class="section-md-75 ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4>Resultado del examen:</h4>
                    <p>Total de preguntas : <?php echo e($total_preguntas); ?></p>
                    <p>Correctas: <?php echo e($correctas); ?></p>
                    <p>Erroneas: <?php echo e($erroneas); ?></p>
                </div>
                <?php if($paso): ?>
                    <p>Obtubiste premios y creaste tu album</p>
                <?php else: ?>
                    <p>No pasaste </p>
                <?php endif; ?>

            </div>
            <?php if($mostrarAlerta): ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                <?php if($paso): ?>
                    <script type="application/javascript">
                        Swal.fire({
                            title: 'Pasaste el Quiz',
                            html: `
                                <p>Acertaste <?php echo e($correctas); ?> preguntas de <?php echo e($total_preguntas); ?> totales</p>
                                <p>Obtuviste 3 cromos para tu album</p>
                            `,
                            icon: 'success',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ir a mi Album',
                            cancelButtonText: 'Volver a las temáticas'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.replace('/album/<?php echo e($newAlbumId); ?>');
                            }else{
                                window.location.replace('/home');
                            }
                        })
                    </script>
                <?php else: ?>
                    <script type="application/javascript" >
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Lo sentimos no pasaste el examen',
                        }).then(res =>{
                            window.location.replace('/home');
                        });


                    </script>
                <?php endif; ?>


            <?php endif; ?>
        </div>

        <style>
            .swal2-popup{
                font-size: 1.6rem !important;
            }
        </style>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('usuario.mainUser', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\JuanJ\Desktop\ECONOTEST ACTUAL\ProyectoCromos2021\EconoTest\resources\views/cuestionario/resultado.blade.php ENDPATH**/ ?>