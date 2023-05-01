from .models import AtividadeModel
from .forms import AtividadeFormModel
from django.shortcuts import render, HttpResponse
import datetime

data = datetime.date.today()

def index(request):
 
    #Criar um dicionario de contexto, e buscar os tasks para a data de hoje
    #passar a variavel como parametro depois do html

    atividades = []

    context = {'listaAtividades': atividades }   
    
    atividades = AtividadeModel.objects.all()

    for atividade in atividades:
        if(atividade.data == data):
            context['listaAtividades'].append(atividade)  

    return render(request,'index.html', context)

def cadastro(request): 
    
    form = AtividadeFormModel   
    return render(request,'cadastro.html', {'form': form})

def processa_formulario(request):
    form = AtividadeFormModel(request.POST)
    if form.is_valid():
        atividade = form.data['atividade']
        detalhes = form.data['detalhes']
        data = form.data['data']

        form.save()
        return cadastro(request)
    return HttpResponse('Registro Inválido')