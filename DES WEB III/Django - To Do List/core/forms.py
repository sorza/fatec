from .models import AtividadeModel
from django.forms import ModelForm

class AtividadeFormModel(ModelForm):
    class Meta:
        model = AtividadeModel
        fields = ['atividade','detalhes','data']
