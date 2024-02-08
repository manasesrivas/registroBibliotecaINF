from django.contrib import admin
from .models import Books

class TasksAdmin(admin.ModelAdmin):
    readonly_fields = ('fechaEntrada', )

admin.site.register(Books, TasksAdmin) #es para que el panel de administracion tenga acceso al panel de administracion 