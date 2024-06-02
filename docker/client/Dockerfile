FROM node:18

WORKDIR /app

COPY client/package*.json ./
# install dependencies
RUN npm install
# copy files and folders to the current working directory (i.e. 'app' folder)
COPY client/ .

EXPOSE 3000

# Start the development server (replace with your command)
CMD [ "npm", "run", "dev", "--", "--host"]