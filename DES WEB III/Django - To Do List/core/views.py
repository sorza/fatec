from .models import AtividadeModel
from .forms import AtividadeFormModel
from django.shortcuts import render, HttpResponse
import datetime

data = datetime.date.today()

def index(request):

    atividades = []

    context = {'listaAtividades': atividades }       
    atividades = AtividadeModel.objects.all()

    for atividade in atividades:
        if(atividade.data == data):
            context['listaAtividades'].append(atividade)  

    return render(request,'index.html', context)

def cadastro(request):     
    if request.method == 'POST':    
        form = AtividadeFormModel(request.POST)
        if form.is_valid():
            atividade = form.data['atividade']
            detalhes = form.data['detalhes']
            data = form.data['data']

            form.save()

            form = AtividadeFormModel()
            return render(request,'cadastro.html', {'form': form})
           
        return HttpResponse('Registro Inválido')
    else:
        form = AtividadeFormModel   
        return render(request,'cadastro.html', {'form': form})
    
def remove_atividade(request, id):
    atividade = AtividadeModel.objects.get(pk=id) 

    if atividade != None:
        atividade.delete()
    return index(request)

def atualizacao(request, id):  
     atividade = AtividadeModel.objects.get(pk=id)
     return render(request,'atualizacao.html', {'form': atividade})
    
def editar(request):
        
        form = AtividadeFormModel(request.POST)        
        if form.is_valid():

            id = form.data['id']
            atv = AtividadeModel.objects.get(pk=id) 

            atv.atividade = form.data['atividade']
            atv.detalhes = form.data['detalhes']
            atv.data = form.data['data']

            atv.save()
            
            form = AtividadeFormModel   
            return index(request)
