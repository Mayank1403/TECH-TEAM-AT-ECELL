from prettytable import PrettyTable
csv_file=open('/Users/amriteshamrit/Desktop/employee.csv ','r')
csv_file=csv_file.readlines()

x=PrettyTable([csv_file[0].split(',')[0],csv_file[0].split(',')[1],csv_file[0].split(',')[2],csv_file[0].split(',')[3]])
for a in range(1,len(csv_file)):
    x.add_row([csv_file[a].split(',')[0],csv_file[a].split(',')[1],csv_file[a].split(',')[2],csv_file[a].split(',')[3]])
html_code=x.get_html_string()
html_file=open('/Users/amriteshamrit/Desktop/index.html ','w')
html_file=html_file.write(html_code)
