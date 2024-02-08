from django.db import models

class Books(models.Model):
    titulo = models.CharField(max_length=40)
    editorial = models.CharField(max_length=100)
    autor = models.CharField(max_length=30)
    fechaEntrada = models.DateField(null=True, blank=True)
    tipoAdquisicion = models.CharField(max_length=40)
    edicion = models.CharField(max_length=40)
    disponible = models.BooleanField(default=True)
    def __str__(self):
        return f'{self.titulo}'

class Readers(models.Model):
    nombres = models.CharField(max_length=60)
    apellidos = models.CharField(max_length=60)
    año = models.CharField(max_length=10, blank=True, null=True)
    seccion = models.CharField(max_length=20, blank=True, null=True)
    especialidad = models.CharField(max_length=40, blank=True, null=True)
    email = models.CharField(max_length=100)
    numeroTelefono = models.IntegerField()
    direccion = models.CharField(max_length=150, blank=True, null=True)
    esDocente = models.BooleanField(default=False)

    YEAR_CHOICES = (
        ('1','1'),
        ('2','2'),
        ('3','3'),
    )

    SECCION_CHOICES = (
        ('A', 'A'),
        ('B', 'B'),
        ('C','C'),
        ('D','D'),
        ('E','E')
    )

    ESPECIALIDADES_CHOICES = (
        ('Administrativo contable', 'Administrativo contable'),
        ('General', 'General'),
        ('Desarrollo de software', 'Desarrollo de software'),
        ('Serviempresa', 'Serviempresa'),
        ('Docente', 'Docente')
    )



class Loans(models.Model):
    idLibro = models.ForeignKey(Books, on_delete=models.CASCADE)
    idLector = models.ForeignKey(Readers, on_delete=models.CASCADE)
    fechaPrestamo = models.DateField(auto_now_add=True)
    fechaEntrega = models.DateField(null=True)
    estado = models.BooleanField(default=True)
