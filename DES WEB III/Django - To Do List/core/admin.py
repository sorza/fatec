from django.contrib import admin
from .models import AtividadeModel
from datetime import date

class AtividadeModelAdmin(admin.ModelAdmin):
    list_display = ('atividade','detalhes','data','cadastrado_em')
    date_hierarchy = 'data'
    search_fields = ('atividade','data')

admin.site.register(AtividadeModel, AtividadeModelAdmin)